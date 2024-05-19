<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Member;

class AdminController extends Controller
{
    //




    public function redirectAdmin()
    {

        $search = request()->query('search');
        if ($search) {
            $users = User::where('type', 1)->where('is_active', 1)->where('user_id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')->paginate(5);
            return view('admin.admin')->with('users', $users);
        } else {
            $users = User::where('type', 1)->where('is_active', 1)->paginate(5);
            return view('admin.admin')->with('users', $users);
        }

    }

    public function redirectArchiveAdmin()
    {
        $search = request()->query('search');
        if ($search) {
            $users = User::where('type', 1)->where('is_active', 0)->where('user_id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')->paginate(5);
            return view('admin.archive.archive-admin')->with('users', $users);
        } else {
            $users = User::where('type', 1)->where('is_active', 0)->get();
            return view('admin.archive.archive-admin')->with('users', $users);
        }
    }



    public function redirectProduct()
    {

        return view('admin.product');
    }




    public function redirectArchiveProduct()
    {


        return view('admin.archive.archive-product');
    }



}