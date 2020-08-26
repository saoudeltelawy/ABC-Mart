<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() 
    {
        return "INDEX Page";
    }


    public function create() 
    {
        return "Admin Prodcuts Create Page";
    }
}
