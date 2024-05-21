<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class SubcategoryController extends Controller
{


    public function index()
    {

        try {
            $search = request()->query('search');
            if ($search) {
                $categories = Category::all();
                $subcategories = Subcategory::where('is_active', 1)
                    ->where('subcategory_id', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('category_name', 'like', '%' . $search . '%');
                    })
                    ->withCount('products')->paginate(5);
                $imageFiles = $this->getSubcategoryImages();
                return view('admin.brands')
                    ->with('subcategories', $subcategories)
                    ->with('categories', $categories)
                    ->with('imageFiles', $imageFiles);
            } else {
                $subcategories = Subcategory::where('is_active', 1)->paginate(5);
                $categories = Category::all();
                $imageFiles = $this->getSubcategoryImages();
                return view('admin.brands')
                    ->with('subcategories', $subcategories)
                    ->with('categories', $categories)
                    ->with('imageFiles', $imageFiles);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function createArchive()
    {
        try {
            $search = request()->query('search');
            if ($search) {
                $archivedSubcategories = Subcategory::where('is_active', 0)->where('subcategory_id', 'like', '%' . $search . '%')
                    ->where('subcategory_id', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('category_name', 'like', '%' . $search . '%');
                    })
                    ->withCount('products')->get();
                $categories = Category::where('is_active', 1)->get();
                return view('admin.archive.archive-subcategory')
                    ->with('categories', $categories)
                    ->with('archivedSubcategories', $archivedSubcategories);
            } else {
                $archivedSubcategories = Subcategory::where('is_active', 0)->withCount('products')->get();
                $categories = Category::where('is_active', 1)->get();
                return view('admin.archive.archive-subcategory')
                    ->with('categories', $categories)
                    ->with('archivedSubcategories', $archivedSubcategories);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
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
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/subcategory_images'), $filename);
            $subcategory->subcategory_image = $filename;
        }
        do {
            $subcategory_id = rand(100000, 999999);
        } while (Category::where('category_id', $subcategory_id)->exists() || Subcategory::where('subcategory_id', $subcategory_id)->exists());
        $subcategory->subcategory_id = $subcategory_id;
        $subcategory->save();
        return redirect()->back()->with('success', 'Subcategory added successfully');
    }

    public function updateSubcategory(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => ['required', 'unique:subcategories,subcategory_name,' . $id],
        ]);
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_description = $request->subcategory_description;

        if ($request->filled('selected_image')) {
            $imageName = basename($request->selected_image);
            $subcategory->subcategory_image = $imageName;
        } elseif ($request->hasFile('subcategory_image')) {
            $image = $request->file('subcategory_image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/subcategory_images'), $filename);
            $subcategory->subcategory_image = $filename;
        }
        $subcategory->save();

        return redirect()->back()->with('success', 'Subcategory updated successfully');
    }
    public function archiveSubcategoryGroup(Request $request)
    {
        $subcategoryIds = $request->input('archiveIds');

        if ($subcategoryIds) {
            $subcategoryArray = explode(",", $subcategoryIds);
            foreach ($subcategoryArray as $subcategoryId) {
                $subcategory = Subcategory::findOrFail($subcategoryId);
                $subcategory->is_active = false;
                $subcategory->save();
                $childSubcategories = Product::where('subcategory_id', $subcategoryId)->get();
                foreach ($childSubcategories as $childSubcategory) {
                    $childSubcategory->is_active = false;
                    $childSubcategory->save();
                }
            }
            return redirect()->back()->with('success', 'Subcategories archived successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }


    }

    public function unarchiveSubcategoryGroup(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategoryIds = $request->input('archiveIds');
        if ($subcategoryIds) {
            $subcategoryArray = explode(",", $subcategoryIds);
            foreach ($subcategoryArray as $subcategoryId) {
                $subcategory = Subcategory::findOrFail($subcategoryId);
                $subcategory->category_id = $categoryId;
                $subcategory->is_active = true;
                $subcategory->save();
                $childSubcategories = Product::where('subcategory_id', $subcategoryId)->get();
                foreach ($childSubcategories as $childSubcategory) {
                    $childSubcategory->is_active = true;
                    $childSubcategory->save();
                }
            }
            return redirect()->back()->with('success', 'Subcategories unarchived successfully');
        }
    }


    public function archiveSubcategory($id)
    {
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

    public function unarchiveSubcategory(Request $request, $id)
    {
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
            $childSubcategory->category_id = $request->category_id;
            $childSubcategory->save();
        }
        return redirect()->back()->with('success', 'Subcategory unarchived successfully');
    }
    public function checkSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return response()->json($subcategory);
    }
    public function getSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return response()->json($subcategory);
    }

    public function getSubcategoryImages()
    {
        $imagePaths = glob(public_path('storage/subcategory_images/*'));
        $imageFiles = array_map(function ($path) {
            $relativePath = str_replace(public_path(), '', $path);
            $relativePath = str_replace('\\', '/', $relativePath); // Replace backslashes with forward slashes
            return asset($relativePath);
        }, $imagePaths);

        return $imageFiles;
    }

}