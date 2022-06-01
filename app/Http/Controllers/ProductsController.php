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
}
