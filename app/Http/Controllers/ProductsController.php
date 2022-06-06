<?php

namespace App\Http\Controllers;

use App\Jobs\SendCheckoutEmail;
use App\Models\Categories;
use App\Models\Furniture;
use App\Models\list_transaction;
use App\Models\transaction;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use PDO;

class ProductsController extends Controller
{
    public function content(Categories $category){
        if(Auth::check()){
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $categories = Categories::all();
            return view('products',[
                "category" => $category,
                "type" => $type,
                "name" => $name,
                "categories" => $categories
            ]);
        }
    }
    public function detail(Furniture $item){
        if(Auth::check()){
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $categories = Categories::all();
            return view('detail',[
                "type" => $type, 
                "item" => $item,
                "name" => $name,
                "categories" => $categories
            ]);
        }
    }
    public function listfurniture(){
        if(Auth::check()){
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $categories = Categories::all();
            if ($type == 2) {
                $products = Furniture::all();
                return view('listproducts',[
                    "type" => $type, 
                    "name" => $name,
                    "categories" => $categories,
                    "furniture" => $products,
                ]);
            } else {
                return redirect()->route('dashboard')->with('not_admin', 'Not allowed! You are not admin!');
            }
        }
    }

    public function edit($id){
        $item = Furniture::where('id', $id)->first();
        $name = auth()->user()->name;
        $categories = Categories::all();
        return view('edit-data',[
            'item' => $item,
            'name' => $name,
            'categories' => $categories,
        ]);
    }

    public function updatedata(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'categories_id' => 'numeric|required',
            'desc' => 'required|max:1000',
            'price' => 'required|numeric',
            'stock' => 'required|numeric', 
        ]);
        // return $validatedData;
        $furniture = Furniture::findOrFail($id);
        $furniture->update($validatedData);
        return redirect()->route('list-products')->with('successful_edit', 'Edit Furniture berhasil');
    }

    public function deletedata($id){
        $furniture = Furniture::findOrFail($id);
        $furniture->delete();
        return redirect()->route('list-products')->with('successful_delete', 'Edit Furniture berhasil');
    }

    public function deletecategories($id){
        $categories = Categories::findOrFail($id);
        $categories->delete();
        return redirect()->route('list-categories')->with('successful_delete', 'Edit Categories berhasil');
    }

    public function listcategories(){
        if(Auth::check()){
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $categories = Categories::all();
            if ($type == 2) {
                return view('listcategories',[
                    "type" => $type, 
                    "name" => $name,
                    "categories" => $categories,
                ]);
            } else {
                return redirect()->route('dashboard')->with('not_admin', 'Not allowed! You are not admin!');
            }
        }
    }

    public function updatecategories(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        // return $validatedData;
        $categories = Categories::findOrFail($id);
        $categories->update($validatedData);
        return redirect()->route('list-categories')->with('successful_edit', 'Edit Categories berhasil');
    }

    public function createdata(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'categories_id' => 'numeric|required',
            'desc' => 'required|max:1000',
            'price' => 'required|numeric',
            'stock' => 'required|numeric', 
        ]);
        $validatedData = Arr::add($validatedData, 'sold', 0);
        // return $validatedData;
        Furniture::create($validatedData);
        return redirect()->route('list-products')->with('successful_create', 'Create Product successful');
    }

    public function createcategories(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        // return $validatedData;
        Categories::create($validatedData);
        return redirect()->route('list-categories')->with('successful_create', 'Create Product successful');
    }

    public function addtocart($id){
        $product = Furniture::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->slug,
                "id" => $product->id,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('successful_cart', 'Product added to cart successfully!');
    }   

    public function cart(){
        if(Auth::check()){
            $categories = Categories::all();
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            return view('cart',[
                'name' => $name,  
                'type' => $type, 
                'categories' => $categories
            ]);
        }
    }

    public function updatecart(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('successful_cart', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request){
        $product = session()->get('cart');
        // return $product == 0;
        if($product == 0){
            return redirect()->route('cart')->with('no_item', 'no item');
        }
        $total = 0;
        $userid = auth()->user()->id;
        $maxVal = transaction::orderBy('id', 'desc')->value('id');
        $maxVal += 1;
        foreach ($product as $item){
            $total += ($item['price'] * $item['quantity']);

            // foreach ($item as $key => $value){
            //     echo "$key = $value<br>";
            // }
            // echo "$item['price']<br>";
            list_transaction::create([
                'transaction_id' => $maxVal,
                'furniture_id' => $item['id'],
                'amount' => $item['quantity'],
            ]);
            $decrem = Furniture::find($item['id']);
            $oper = $decrem->stock - $item['quantity'];
            $decrem->update(['stock' => $oper]);
        }
        transaction::create([
            'total_price' => $total,
            'user_id' => $userid,
        ]);
        
        $request->session()->forget('cart');
        
        return redirect()->route('dashboard')->with('successfully_checkout', 'Finally checked out!');
        // echo "$total <br>";
        // echo "$maxVal <br>";
        // echo "$userid";
        // $name = auth()->user()->name;
        // $email = auth()->user()->email;
        // $data = [];
        // $data = Arr::add($data, 'name', $name);
        // $data = Arr::add($data, 'email', $email);
        // $emailjobs =  new SendCheckoutEmail($data, $product);
        // $this->dispatch($emailjobs);
    }

    public function history(){
        if(Auth::check()){
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $id =  auth()->user()->id;
            $transaction = transaction::where('user_id', '=', $id)->get();
            $categories = Categories::all();
            return view('history',[
                'name' => $name,  
                'type' => $type, 
                'categories' => $categories,
                'transaction' => $transaction,
            ]);
        }
    }
}
