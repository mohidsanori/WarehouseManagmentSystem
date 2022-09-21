<?php

namespace App\Http\Controllers\Admin\Storage;

use Illuminate\Http\Request;
use App\Models\storage\Warehouse;
use App\Models\allproducts\Product;
use App\Http\Controllers\Controller;
use App\Models\storage\WarehouseLink;
use Illuminate\Support\Facades\Session;
use App\Models\storage\WarehouseSections;

class WarehouseSectionsController extends Controller
{
    public function index(Request $request)
    {
        $warehouseSection = WarehouseSections::all();
        return view('admin.storage.WarehousesSections.index', compact(['warehouseSection']));
    }

    public function create()
    {
        $warehouse = Warehouse::all();
        return view('admin.storage.WarehousesSections.create', compact(['warehouse']));
    }

    public function store(Request $request)
    {
        $warehouseSection = new WarehouseSections;
        $warehouseSection->warehouse = $request->warehouse;
        $warehouseSection->section = $request->section;
        $warehouseSection->rows = $request->rows;
        $warehouseSection->columns = $request->columns;
        $warehouseSection->shelves = $request->shelves;
        $warehouseSection->racks = $request->racks;
        $warehouseSection->save();

        return to_route('WarehousesSections.index')->with('message', 'Warehouse Section Added Successfully!');
    }

    public function edit($warehouse_id)
    {
        $warehouse = Warehouse::all();
        $warehouseSection = WarehouseSections::find($warehouse_id);
        return view('admin.storage.WarehousesSections.edit', compact('warehouseSection', 'warehouse'));
    }

    public function update(Request $request, $warehouse_id)
    {
        $warehouseSection = WarehouseSections::find($warehouse_id);
        $warehouseSection->warehouse = $request->warehouse;
        $warehouseSection->section = $request->section;
        $warehouseSection->rows = $request->rows;
        $warehouseSection->columns = $request->columns;
        $warehouseSection->shelves = $request->shelves;
        $warehouseSection->racks = $request->racks;
        $warehouseSection->update();

        return to_route('WarehousesSections.index')->with('message', 'Warehouse Section Updated Successfully!');
    }

    public function destroy($warehouse_id)
    {
        $warehouse = WarehouseSections::find($warehouse_id);
        $warehouse->delete();
        return to_route('WarehousesSections.index')->with('message', 'Warehouse Section Deleted Successfully!');
    }

    public function location($warehouse_id)
    {
        $warehouse = WarehouseSections::find($warehouse_id);
        return view('admin.storage.WarehousesSections.location', compact('warehouse'));
    }

    public function number(Request $request, $warehouse_id, $warehouses_link_location)
    {
        $location = $request->number;
        // dd($location);
        $product = Product::all();
        $warehouses_link = WarehouseLink::all()->where('location', $warehouses_link_location);
        $warehouse = WarehouseSections::find($warehouse_id);
        return view('admin.storage.WarehousesSections.number', compact('product', 'location', 'warehouse', 'warehouses_link'));
    }

    public function link(Request $request, $warehouse_id)
    {
        $location = $request->number;
        $product = Product::all();
        $warehouses_link = WarehouseLink::all();
        $warehouse = WarehouseSections::find($warehouse_id);
        return view('admin.storage.WarehousesSections.link', compact('product', 'location', 'warehouse', 'warehouses_link'));
    }

    public function assignquantity(Request $request, $warehouses_link_id)
    {
        $product = Product::find($request->product_id);
        $linked_quantity = $request->linked_quantity + $product->linked_quantity;
        if ($linked_quantity > $product->quantity)
            return back()->with('message', 'Limit exceeded!');
        else {
            $find = WarehouseLink::find($warehouses_link_id);
            if (!$find){
            $warehouselink = new WarehouseLink;
            $warehouselink->product_id = $request->product_id;
            $warehouselink->warehouse_id = $request->warehouse_id;
            $warehouselink->linked_quantity = $request->linked_quantity;
            $product->update(['linked_quantity' => $linked_quantity]);
            $warehouselink->location = $request->location;
            $warehouselink->save();
            return back()->with('message', 'Product linked Successfully!');
            }
            else
            $warehouselink =  WarehouseLink::find('id');
            $warehouselink->linked_quantity = $linked_quantity;
            $product->update(['linked_quantity' => $linked_quantity]);
            $warehouselink->update();
            return back()->with('message', 'Product Updated Successfully!');
        }
    }

    // public function quantityupdate(Request $request)
    // {
    //     $product = Product::find($request->product_id);
    //     $linked_quantity = $request->linked_quantity;
    //     if ($linked_quantity > $product->quantity)
    //         return back()->with('message', 'Limit exceeded!');
    //     else {
    //         $warehouselink =  WarehouseLink::find('id');
    //         $warehouselink->product_id = $request->product_id;
    //         $warehouselink->warehouse_id = $request->warehouse_id;
    //         $warehouselink->linked_quantity = $linked_quantity;
    //         $product->update(['linked_quantity' => $linked_quantity]);
    //         $warehouselink->location = $request->location;
    //         $warehouselink->save();
    //         return back()->with('message', 'Product linked Successfully!');
    //     }
    // }

    // public function updatequantity(Request $request)
    // {
    //     $product = Product::find($request->product_id);
    //     $linked_quantity = $request->linked_quantity;
    //     if ($linked_quantity > $product->quantity)
    //         return back()->with('message', 'Limit exceeded!');
    //     else {
    //         $warehouselink =  WarehouseLink::find('id');
    //         $warehouselink->product_id = $request->product_id;
    //         $warehouselink->warehouse_id = $request->warehouse_id;
    //         $warehouselink->linked_quantity = $linked_quantity;
    //         $product->update(['linked_quantity' => $linked_quantity]);
    //         $warehouselink->location = $request->location;
    //         $warehouselink->save();
    //         return back()->with('message', 'Product linked Successfully!');
    //     }
    // }

    public function unlink(WarehouseLink $WarehouseLink)
    {
        $WarehouseLink->delete();
        return back()->with('message', 'Unlinked Successfully!');
    }
}
