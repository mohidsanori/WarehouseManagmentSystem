<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Models\allproducts\Barcode;
use App\Models\allproducts\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use PDF;

class BarcodeController extends Controller
{
    public function index(Request $request, $product_id)
    {
        $barcode = Barcode::where('product_id', $product_id)->get();
        $product = Product::find($product_id);
        Session::put('barcode_url', request()->fullurl());
        return view('admin.products.allproducts.barcode.index', compact('barcode', 'product'));
    }

    public function create($product_id)
    {
        $product = Product::find($product_id);
        return view('admin.products.allproducts.barcode.create', compact('product'));
    }

    public function store(Request $request, $product_id)
    {
        $barcode = new Barcode;
        $barcode->product_id = $product_id;
        $barcode->bar_num = $request->bar_num;
        $barcode->quantity = $request->quantity;
        $barcode->save();

        return redirect(session(key: 'barcode_url'))->with('message', 'Barcode Added Successfully!');
    }

    public function print($product_id, $barcode_id)
    {
        $barcode = Barcode::find($barcode_id);
        $pdf = PDF::loadView('admin.products.allproducts.barcode.print', ['data' => $barcode]);
        return $pdf->stream('barcode.pdf');
    }

    public function edit($product_id, $barcode_id)
    {
        $barcode = Barcode::find($barcode_id);
        $product = Product::find($product_id);
        return view('admin.products.allproducts.barcode.edit', compact('barcode', 'product'));
    }

    public function update($product_id, $barcode_id, Request $request)
    {
        $barcode = Barcode::find($barcode_id);
        $barcode->product_id = $product_id;
        $barcode->bar_num = $request->bar_num;
        $barcode->quantity = $request->quantity;

        $barcode->update();

        return redirect(session(key: 'barcode_url'))->with('message', 'Barcode Updated Successfully!');
    }

    public function destroy($product_id, Barcode $barcode)
    {
        $barcode->delete();
        return back()->with('message', 'Barcode Deleted Successfully!');
    }
}
