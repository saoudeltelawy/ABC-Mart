<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
       $allproducts = Product::all();

       return view('admin.product.index' , compact('allproducts'));
    }


    public function create()
    {
        $category = Category::all();

        return view('admin.product.create' , compact('category'));
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    
    public function destroy(Product $product)
    {
        //
    }
}
