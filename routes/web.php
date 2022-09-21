<?php

use App\Models\allproducts\Barcode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Products\TypeController;
use App\Http\Controllers\Admin\Products\BrandController;
use App\Http\Controllers\Admin\Management\RoleController;
use App\Http\Controllers\Admin\Management\UserController;
use App\Http\Controllers\Admin\Management\IndexController;
use App\Http\Controllers\Admin\Products\BarcodeController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\CategoryController;
use App\Http\Controllers\Admin\Storage\WarehouseController;
use App\Http\Controllers\Admin\Inventory\InventoryController;
use App\Http\Controllers\Admin\Management\PermissionController;
use App\Http\Controllers\Admin\Storage\WarehouseSectionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::resource('/users', UserController::class);
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    Route::resource('/allproducts', ProductController::class);
    Route::get('/allproducts/{product}/barcode/{barcode}/print', [BarcodeController::class, 'print']);
    Route::get('/allproducts/{product}/barcode/{barcode}/edit', [BarcodeController::class, 'edit']);
    Route::post('/allproducts/{product}/barcode/{barcode}/update', [BarcodeController::class, 'update']);
    Route::delete('/allproducts/{product}/barcode/{barcode}/destroy', [BarcodeController::class, 'destroy']);

    Route::resource('/allproducts/{product}/barcode', BarcodeController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/types', TypeController::class);

    Route::get('/inventory/stockin', [InventoryController::class, 'stockin'])->name('inventory.stockin');
    Route::post('/inventory/stockin{product}', [InventoryController::class, 'stockinupdate'])->name('inventory.stockin.update');
    Route::get('/inventory/stockout', [InventoryController::class, 'stockout'])->name('inventory.stockout');
    Route::post('/inventory/stockout{product}', [InventoryController::class, 'stockoutupdate'])->name('inventory.stockout.update');
    Route::get('/inventory/bulk', [InventoryController::class, 'bulk'])->name('inventory.bulk');
    Route::post('/inventory/bulk{product}', [InventoryController::class, 'bulkupdate'])->name('inventory.bulk.update');

    Route::resource('/storage/Warehouses', WarehouseController::class);
    Route::resource('/storage/WarehousesSections', WarehouseSectionsController::class);
    Route::get('/storage/WarehousesSections/{WarehousesSections}/location', [WarehouseSectionsController::class, 'location'])->name('WarehousesSections.location');
    Route::post('/storage/WarehousesSections/{WarehousesSections}/location/{number}/link/assignquantity', [WarehouseSectionsController::class, 'assignquantity']);
    // Route::get('/storage/WarehousesSections/{WarehousesSections}/location/{number}/link/update', [WarehouseSectionsController::class, 'quantityupdate']);
    // Route::post('/storage/WarehousesSections/{WarehousesSections}/location/{number}/link/update/updatequantity', [WarehouseSectionsController::class, 'updatequantity']);
    Route::get('/storage/WarehousesSections/{WarehousesSections}/location/{number}/link', [WarehouseSectionsController::class, 'link'])->name('WarehousesSections.link');
    Route::delete('/storage/WarehousesSections/{WarehousesSections}/location/{number}/unlink', [WarehouseSectionsController::class, 'unlink']);
    Route::get('/storage/WarehousesSections/{WarehousesSections}/location/{number}', [WarehouseSectionsController::class, 'number'])->name('WarehousesSections.number');
});

require __DIR__ . '/auth.php';
