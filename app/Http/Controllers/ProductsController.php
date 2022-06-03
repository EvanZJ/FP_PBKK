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

    public function listcategories(){
        if(Auth::check()){
            $name = auth()->user()->name;
            $type = auth()->user()->type;
            $categories = Categories::all();
            if ($type == 1) {
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
    // public function addtocart();
}
