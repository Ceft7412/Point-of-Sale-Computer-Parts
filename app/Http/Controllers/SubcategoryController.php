<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class SubcategoryController extends Controller
{   

    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;  
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_description = $request->subcategory_description;
        if ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $imagePath = $image->store('public/subcategory_images');
            $subcategory->subcategory_image = $imagePath;
        }
        do {
            $subcategory_id = rand(100000, 999999);
        } while (Category::where('category_id', $subcategory_id)->exists() || Subcategory::where('subcategory_id', $subcategory_id)->exists());
        $subcategory->subcategory_id = $subcategory_id;
        $subcategory->save();
        return redirect()->back()->with('success','Subcategory added successfully');
    }

    public function updateSubcategory(Request $request, $id)
    {   
        $request->validate([
            'subcategory_name' => 'required',
        ]);
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_description = $request->subcategory_description;
        if ($request->filled('selected_image')) {
            // Extract the image name from the full path
            $imageName = basename($request->selected_image);

            // Assign the image name to $category->category_image
            $subcategory->subcategory_image = $imageName;
        } elseif ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $imagePath = $image->store('public/subcategory_images');
            $subcategory->subcategory_image = $imagePath;
        }
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory updated successfully');
    }

    public function archiveSubcategory($id){
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->is_active = false;
        $subcategory->save();
        $childSubcategories = Product::where('subcategory_id', $id)->get();
        foreach ($childSubcategories as $childSubcategory) {
            $childSubcategory->is_active = false;
            $childSubcategory->save();
        }
        return redirect()->back()->with('success', 'Subcategory archived successfully');
    }

    public function unarchiveSubcategory(Request $request, $id){
        $request->validate([
            'category_id' => 'required',
        ]);
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->is_active = 1;
        $subcategory->save();
        $childSubcategories = Product::where('subcategory_id', $id)->get();
        foreach ($childSubcategories as $childSubcategory) {
            $childSubcategory->is_active = true;
            $childSubcategory->save();
        }
        return redirect()->back()->with('success', 'Subcategory unarchived successfully');
    }
    public function getSubcategory($id){
        $subcategory = Subcategory::findOrFail($id);
        return response()->json($subcategory);
    }

    public function getSubcategoryImages()
    {
        $imagePath = Storage::disk('public')->files('subcategory_images');
        $imageFiles = array_map(function ($file) {
            return asset('storage/' . $file);
        }, $imagePath);
        return $imageFiles;
    }

}
