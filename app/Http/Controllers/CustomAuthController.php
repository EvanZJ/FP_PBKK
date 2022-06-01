<?php
namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Mail\WelcomeNewUserEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerHasRegisteredEvent;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('successful_login', 'Signed in');
        }
  
        return redirect('login')->with('failed_login', 'Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        
        event(new NewCustomerHasRegisteredEvent($check));
        

        // // Register the account to newsletter
        // dump('Registered to newsletter');

        // // Slack notification to Admin
        // dump('slack message here');

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            $categories = Categories::all();
            $name = auth()->user()->name;
            return view('dashboard',[
                'name' => $name,   
                'categories' => $categories
            ]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}