<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function list(){
        if(Auth::check()){
            $categories = Categories::all();
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $user = User::all();
            // return $user;
            if ($type == 2) {
                return view('accounts',[
                    'name' => $name,  
                    'type' => $type, 
                    'categories' => $categories,
                    'users' => $user,
                ]);
            } 
            else {
                return redirect()->route('dashboard')->with('not_admin', 'Not allowed! You are not admin!');
            }
        }
    }

    public function updateaccount(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);
        // return $validatedData;
        $user = User::findOrFail($id);
        $user->update($validatedData);
        return redirect()->route('account')->with('successful_edit', 'Edit Categories berhasil');
    }

    public function deleteaccount($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('account')->with('successful_delete', 'Edit Categories berhasil');
    }
}
