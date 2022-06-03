<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if ($type == 1) {
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

    public function update(Request $request, Furniture $item){
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'categories_id' => 'numeric|required',
            'desc' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric', 
        ]);
        return view($validatedData);
        $furniture = Furniture::findOrFail($item->id);
        $furniture->update($validatedData);
        return redirect()->route('list-products')->with('successful_edit', 'Edit Furniture berhasil');
    }
    // public function addtocart();
}
