<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

use App\Models\Subcategory;

class ProductController extends Controller
{
    public function redirectProduct()
    {

        $search = request()->query('search');
        if ($search) {
            $products = Product::where('product_id', 'like', '%' . $search . '%')->get();
            $subcategories = Subcategory::all();
            $imageFiles = $this->getProductImages();
            return view('admin.product')
                ->with('products', $products)
                ->with('subcategories', $subcategories)
                ->with('imageFiles', $imageFiles);
        } else {
            $products = Product::where('is_active', 1)->get();
            $subcategories = Subcategory::all();
            $imageFiles = $this->getProductImages();
            return view('admin.product')
                ->with('products', $products)
                ->with('subcategories', $subcategories)
                ->with('imageFiles', $imageFiles);
        }

    }


    public function redirectArchiveProduct()
    {

        $search = request()->query('search');
        if ($search) {
            $products = Product::where('is_active', 0)->where('product_id', 'like', '%' . $search . '%')->get();
            $subcategories = Subcategory::all();
            $imageFiles = $this->getProductImages();
            return view('admin.archive.archive-product')
                ->with('products', $products)
                ->with('subcategories', $subcategories)
                ->with('imageFiles', $imageFiles);
        } else {
            $products = Product::where('is_active', 0)->get();
            $subcategories = Subcategory::all();
            $imageFiles = $this->getProductImages();
            return view('admin.archive.archive-product')
                ->with('products', $products)
                ->with('subcategories', $subcategories)
                ->with('imageFiles', $imageFiles);
        }
    }
    public function searchProduct(Request $request)
    {
        $search = $request->input('query');
        $searchedProducts = Product::where('product_id', 'like', '%' . $search . '%')->get();
        return view('admin.product')->with('searchedProducts', $searchedProducts);
    }

    public function storeProduct(Request $request)
    {

        $request->validate([
            'subcategory_id' => 'required',
            'product_name' => 'required|unique:products|max:50',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,jfif|max:20048',
            'product_price' => 'required',
            'product_quantity' => 'required|numeric|min:0',
        ]);
        do {
            $product_id = rand(10000, 99999);
        } while (Product::where('product_id', $product_id)->exists());
        $product = new Product();
        $product->product_id = $product_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->category_id = Subcategory::find($request->subcategory_id)->category_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagePath = $image->store('public/product_images');
            $product->product_image = $imagePath;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully');
        ;

    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->subcategory_id = $request->subcategory_id;
        $product->category_id = Subcategory::find($request->subcategory_id)->category_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;



        if ($request->filled('selected_image')) {
            $imageName = basename($request->selected_image);
            $product->product_image = $imageName;
        } elseif ($request->hasFile('product_image')) {

            $image = $request->file('product_image');
            $imagePath = $image->store('public/product_images');
            $product->product_image = $imagePath;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product updated successfully');
    }


    public function archiveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->is_active = false;
        $product->save();
        return redirect()->back()->with('success', 'Product archived successfully');
    }
    public function unarchiveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->is_active = true;
        $product->save();
        return redirect()->back()->with('success', 'Product unarchived successfully');
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    public function archiveProductGroup(Request $request)
    {
        $product_ids = $request->input('productIds');
        if ($product_ids) {
            foreach ($product_ids as $product_id) {
                $product = Product::findOrFail($product_id);
                $product->is_active = false;
                $product->save();
            }

            return redirect()->back()->with('success', 'Products archived successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }
    }


    public function unarchiveProductGroup(Request $request)
    {
        $product_ids = $request->input('productIds');
        if ($product_ids) {
            foreach ($product_ids as $product_id) {
                $product = Product::findOrFail($product_id);
                $product->is_active = true;
                $product->save();
            }

            return redirect()->back()->with('success', 'Products unarchived successfully');
        } else {
            return redirect()->back()->with('error', 'No categories selected');
        }

    }
    public function getProductImages()
    {
        $imagePaths = Storage::disk('public')->files('product_images');
        $imageFiles = array_map(function ($path) {
            return asset('storage/' . $path);
        }, $imagePaths);

        return $imageFiles;
    }
}
