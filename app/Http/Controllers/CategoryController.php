<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function redirectCategory()
    {
        $search = request()->query('search');
        if ($search) {
            $categories = Category::where('is_active', 1)->where('category_id', 'like', '%' . $search . '%')
                ->orWhere('category_name', 'like', '%' . $search . '%')
                ->paginate(5);
            $imageFiles = $this->getCategoryImages();
            return view('admin.category')
                ->with('categories', $categories)
                ->with('imageFiles', $imageFiles);

        } else {
            $categories = Category::where('is_active', 1)->paginate(5);
            $imageFiles = $this->getCategoryImages();
            return view('admin.category')
                ->with('categories', $categories)
                ->with('imageFiles', $imageFiles);

        }




    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_image' => 'required|image|mimes:jpeg,png,jpg|max:20048',
            'category_name' => 'required|unique:categories',

        ]);

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/category_images'), $filename);
            $category->category_image = $filename;
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
            'category_name' => ['required', 'unique:categories,category_name,' . $id],
        ]);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;

        if ($request->filled('selected_image')) {
            $imageName = basename($request->selected_image);
            $category->category_image = $imageName;
        } elseif ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/category_images'), $filename);
            $category->category_image = $filename;
        }
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully');


    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    public function archiveCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = false;
        $category->save();
        $childCategories = Subcategory::where('category_id', $id)->get();
        foreach ($childCategories as $childCategory) {
            $childCategory->is_active = false;
            $childCategory->save();
        }
        return redirect()->back()->with('success', 'Category archived successfully');
    }

    public function unarchiveCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = true;
        $category->save();
        $childCategories = Subcategory::where('category_id', $id)->get();
        foreach ($childCategories as $childCategory) {
            $childCategory->is_active = true;
            $childCategory->save();
        }
        return redirect()->back()->with('success', 'Category unarchived successfully');
    }
    public function archivedCategories()
    {
        $search = request()->query('search');
        if ($search) {
            $archivedCategories = Category::where('is_active', 0)->where('category_id', 'like', '%' . $search . '%')
                ->orWhere('category_name', 'like', '%' . $search . '%')
                ->paginate(5);
            $archivedSubcategories = Subcategory::where('is_active', 0)->get();
            return view('admin.archive.archive-category')
                ->with('archivedCategories', $archivedCategories)
                ->with('archivedSubcategories', $archivedSubcategories);
        } else {
            $archivedCategories = Category::where('is_active', 0)->get();
            $archivedSubcategories = Subcategory::where('is_active', 0)->get();
            return view('admin.archive.archive-category')
                ->with('archivedCategories', $archivedCategories)
                ->with('archivedSubcategories', $archivedSubcategories);
        }

    }



    public function checkCategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }


    public function archiveCategoryGroup(Request $request)
    {
        $categoryIds = $request->input('archiveIds');
        if ($categoryIds) {
            $categoryIdsArray = explode(',', $categoryIds);
            foreach ($categoryIdsArray as $categoryId) {
                $category = Category::find($categoryId);
                if ($category) {
                    $category->is_active = 0;
                    $category->save();
                    $childCategories = Subcategory::where('category_id', $categoryId)->get();
                    foreach ($childCategories as $childCategory) {
                        $childCategory->is_active = 0;
                        $childCategory->save();
                    }
                }
            }
            return redirect()->back()->with('success', 'Categories archived successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }

    }

    public function unarchiveCategoryGroup(Request $request)
    {
        $categoryIds = $request->input('archiveIds');
        if ($categoryIds) {

            $subcategoryArray = explode(",", $categoryIds);
            foreach ($subcategoryArray as $categoryId) {
                $category = Category::findOrFail($categoryId);
                $category->is_active = true;
                $category->save();
                $childCategories = Subcategory::where('category_id', $categoryId)->get();
                foreach ($childCategories as $childCategory) {
                    $childCategory->is_active = true;
                    $childCategory->save();
                }

            }

            return redirect()->back()->with('success', 'Categories unarchived successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }
    }
    public function getCategoryImages()
    {
        $imagePaths = glob(public_path('storage/category_images/*'));
        $imageFiles = array_map(function ($path) {
            $relativePath = str_replace(public_path(), '', $path);
            $relativePath = str_replace('\\', '/', $relativePath);
            return asset($relativePath);
        }, $imagePaths);
        return $imageFiles;
    }



}