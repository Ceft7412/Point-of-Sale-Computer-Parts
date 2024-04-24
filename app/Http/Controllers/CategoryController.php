<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function redirectCategory()
    {

        $categories = Category::where('is_active', 1)->get();
        $subcategories = Subcategory::all();
        $imageFiles = $this->getCategoryImages();
        return view('admin.category')->with('categories', $categories)
            ->with('subcategories', $subcategories)
            ->with('imageFiles', $imageFiles);
    }

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
            $imageName = time() . '.' . $image->getClientOriginalExtension();
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

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'category_name' => 'required',
        ]);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;

        if ($request->filled('selected_image')) {
            // Extract the image name from the full path
            $imageName = basename($request->selected_image);
    
            // Assign the image name to $category->category_image
            $category->category_image = $imageName;
        } elseif ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/category_uploads');
            $image->move($destinationPath, $imageName);
            $category->category_image = $imageName;
        }
        $category->save();
       
        return redirect()->back();


    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function archivedCategories()
    {

        $archivedCategories = Category::where('is_active', 0)->get();
        $archivedSubcategories = Subcategory::all();
        return view('admin.archive.archive-category')->with('categories', $archivedCategories)->with('subcategories', $archivedSubcategories);
    }

    public function archiveCategoryGroup(Request $request)
    {
        $categoryIds = $request->input('categoryIds');
        if ($categoryIds) {
            foreach ($categoryIds as $categoryId) {
                $category = Category::find($categoryId);
                $category->is_active = false;
                $category->save();
            }
            return redirect()->back()->with('success', 'Categories set to inactive successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }
    }

    public function unarchiveCategoryGroup(Request $request)
    {
        $categoryIds = $request->input('categoryIds');
        if ($categoryIds) {
            foreach ($categoryIds as $categoryId) {
                $category = Category::find($categoryId);
                $category->is_active = true;
                $category->save();
            }
            return redirect()->back()->with('success', 'Category set to active successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }
    }
    public function getCategoryImages()
    {
        $imageFiles = File::glob(public_path('/assets/images/category_uploads/*.{jpg,jpeg,png,gif}'), GLOB_BRACE);
        $imageFiles = array_map(function ($file) {
            return str_replace(public_path(), '', $file);
        }, $imageFiles);

        return $imageFiles;
    }
    
    

}
