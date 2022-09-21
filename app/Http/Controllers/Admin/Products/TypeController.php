<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Models\allproducts\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::get();
        return view('admin.products.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.products.types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required| unique:types,title',
            'description' => 'nullable'
        ]);
        Type::create($validated);

        return to_route('types.index')->with('message', 'Type Added Successfully!');
    }
}
