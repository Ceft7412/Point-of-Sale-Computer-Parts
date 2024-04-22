<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function redirectOverview()
    {
        return view('admin.overview');
    }
    
    public function redirectAdmin()
    {
        $users = User::where('type', 1)->where('is_active', 1)->get();    
        return view('admin.admin')->with('users', $users);
    }
    public function redirectProduct()
    {

        return view('admin.product');
    }
    public function redirectCategory()
    {

        return view('admin.category');
    }
    public function redirectArchiveEmployee()
    {
        $users = User::where('type', 2)->where('is_active', 0)->get();
        return view('admin.archive.archive-employee')->with('users', $users);
    }
    public function redirectArchiveAdmin()
    {
        $users = User::where('type', 1)->where('is_active', 0)->get();
        return view('admin.archive.archive-admin')->with('users', $users);
    }
    public function redirectArchiveCategory(){


        return view('admin.archive.archive-category');   
    }
    public function redirectArchiveProduct(){


        return view('admin.archive.archive-product');   
    }
    
    
    
    
}
