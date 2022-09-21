<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Models\allproducts\Type;
use App\Models\allproducts\Brand;
use App\Models\allproducts\Product;
use App\Http\Controllers\Controller;
use App\Models\allproducts\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('admin.products.allproducts.index', compact(['products']));
    }

    public function create()
    {
        $type = Type::all();
        $brand = Brand::all();
        $category = Category::all();
        return view('admin.products.allproducts.create', compact(['type', 'brand', 'category']));
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->status = $request->status;
        $product->min_stock = $request->min_stock;
        $product->reorder = $request->reorder;
        $product->sale_price = $request->sale_price;
        $product->description = $request->description;
        if ($request->hasfile('product_image')) {
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/product/', $filename);
            $product->product_image = $filename;
        }
        $product->save();

        return to_route('allproducts.index')->with('message', 'Product Added Successfully!');
    }

    public function edit($product_id)
    {
        $type = Type::all();
        $brand = Brand::all();
        $category = Category::all();
        $product = Product::find($product_id);
        return view('admin.products.allproducts.edit', compact('product', 'category', 'type', 'brand'));
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->name = $request->name;
        $product->type = $request->type;
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->status = $request->status;
        $product->min_stock = $request->min_stock;
        $product->reorder = $request->reorder;
        $product->sale_price = $request->sale_price;
        $product->description = $request->description;
        if ($request->hasfile('product_image')) {
            $destination = 'uploads/product/' . $product->image;
            $file = $request->file('product_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/product/', $filename);
            $product->product_image = $filename;
        }
        $product->update();

        return to_route('allproducts.index')->with('message', 'Product Updated Successfully!');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->barcode()->delete();
        $product->delete();
        return to_route('allproducts.index')->with('message', 'Product Deleted Successfully!');
    }
}
