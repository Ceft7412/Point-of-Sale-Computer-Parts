<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.category')->with('categories', $categories)
                                     ->with('subcategories', $subcategories);
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

    // *Storing category into database
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
           
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/category_uploads');
            $image->move($destinationPath, $imageName); 
            $category->category_image = $imageName;
        }
        do {
            $category_id = rand(100000, 999999);
        } while (Category::where('category_id', $category_id)->exists() || Subcategory::where('subcategory_id', $category_id)->exists());
        $category->category_id = $category_id;
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully');
    }


    // *Storing subcategory into database
    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_description = $request->subcategory_description;
        if ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/subcategory_uploads');
            $image->move($destinationPath, $imageName); 
            $subcategory->subcategory_image = $imageName;
        }
        do {
            $subcategory_id = rand(100000, 999999);
        } while (Category::where('category_id', $subcategory_id)->exists() || Subcategory::where('subcategory_id', $subcategory_id)->exists());
        $subcategory->subcategory_id = $subcategory_id;
        $subcategory->save();
        return redirect()->back()->with('success','Subcategory added successfully');
    }
}
