<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Models\allproducts\Brand;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        return view('admin.products.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.products.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required| unique:brands,title',
            'description' => 'nullable'
        ]);
        Brand::create($validated);

        return to_route('brands.index')->with('message', 'Brand Added Successfully!');
    }
}
