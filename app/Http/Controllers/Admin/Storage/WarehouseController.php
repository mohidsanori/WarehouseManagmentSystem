<?php

namespace App\Http\Controllers\Admin\Storage;

use Illuminate\Http\Request;
use App\Models\storage\Warehouse;
use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $warehouse = Warehouse::all();
        return view('admin.storage.Warehouses.index', compact(['warehouse']));
    }

    public function create()
    {
        return view('admin.storage.Warehouses.create');
    }

    public function store(Request $request)
    {
        $warehouse = new Warehouse;
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->town = $request->town;
        $warehouse->postalcode = $request->postalcode;
        $warehouse->city = $request->city;
        $warehouse->country = $request->country;
        $warehouse->phone = $request->phone;
        $warehouse->type = $request->type;
        $warehouse->fax = $request->fax;
        $warehouse->email = $request->email;
        $warehouse->note = $request->note;
        $warehouse->save();

        return to_route('Warehouses.index')->with('message', 'Warehouse Added Successfully!');
    }

    public function edit($warehouse_id)
    {
        $Warehouse = Warehouse::find($warehouse_id);
        return view('admin.storage.Warehouses.edit', compact('Warehouse'));
    }

    public function update(Request $request, $warehouse_id)
    {
        $warehouse = Warehouse::find($warehouse_id);
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->town = $request->town;
        $warehouse->postalcode = $request->postalcode;
        $warehouse->city = $request->city;
        $warehouse->country = $request->country;
        $warehouse->phone = $request->phone;
        $warehouse->type = $request->type;
        $warehouse->fax = $request->fax;
        $warehouse->email = $request->email;
        $warehouse->note = $request->note;
        $warehouse->update();

        return to_route('Warehouses.index')->with('message', 'Warehouse Updated Successfully!');
    }

    public function destroy($warehouse_id)
    {
        $warehouse = Warehouse::find($warehouse_id);
        $warehouse->delete();
        return to_route('Warehouses.index')->with('message', 'Warehouse Deleted Successfully!');
    }
}
