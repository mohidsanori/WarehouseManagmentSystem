<?php

namespace App\Http\Controllers\Admin\Inventory;

use Illuminate\Http\Request;
use App\Models\allproducts\Barcode;
use App\Models\allproducts\Product;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function stockin(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $barcode = Barcode::where('bar_num', 'LIKE', "%$search%")->get();
        } else {
            $barcode = Barcode::all();
        }

        return view('admin.inventory.stockin', compact('search', 'barcode'));
    }

    public function stockinupdate(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->quantity = $product->quantity +  $request->stockin;

        $product->update();

        return back()->with('message', 'Stock In Successfully!');
    }

    public function stockout(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $barcode = Barcode::where('bar_num', 'LIKE', "%$search%")->get();
        } else {
            $barcode = Barcode::all();
        }

        return view('admin.inventory.stockout', compact('search', 'barcode'));
    }

    public function stockoutupdate(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->quantity = $product->quantity -  $request->stockout;

        $product->update();

        return back()->with('message', 'Stock Out Successfully!');
    }

    public function bulk(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $barcode = Barcode::where('bar_num', 'LIKE', "%$search%")->get();
        } else {
            $barcode = Barcode::all();
        }

        return view('admin.inventory.bulk', compact('search', 'barcode'));
    }

    public function bulkupdate(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->quantity = $request->bulk;

        $product->update();

        return back()->with('message', 'Bulk Stocked Successfully!');
    }
}
