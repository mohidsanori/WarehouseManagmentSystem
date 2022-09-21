<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\allproducts\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.products.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.products.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required| unique:categories,title',
            'description' => 'nullable'
        ]);
        Category::create($validated);

        return to_route('categories.index')->with('message', 'Category Added Successfully!');
    }
}
