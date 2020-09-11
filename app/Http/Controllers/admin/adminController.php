<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class adminController extends Controller
{

    public function main(){
        return view('admin.admindashboard');
    }
}
