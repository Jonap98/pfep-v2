<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pfep\PartsInformationController;
use App\Http\Controllers\Pfep\SupplyController;
use App\Http\Controllers\Pfep\WarehouseController;
use App\Http\Controllers\Pfep\PackagingController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// =======================================================
// Auth
// =======================================================

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('usuarios', [AuthController::class, 'getUsers'])->name('usuarios');
Route::post('usuarios/update', [AuthController::class, 'update'])->name('usuarios.update');


// =======================================================
// Parts information
// =======================================================
Route::get('get-part-information/{part_number}', [PartsInformationController::class, 'search']);
Route::post('part-information/update', [PartsInformationController::class, 'update']);
Route::post('part-information/store', [PartsInformationController::class, 'store']);

// =======================================================
// Supply
// =======================================================
Route::get('supply/search/{part_number}', [SupplyController::class, 'search']);
Route::post('supply/store', [SupplyController::class, 'store']);
Route::post('supply/update', [SupplyController::class, 'update']);
Route::post('supply/delete', [SupplyController::class, 'delete']);

// =======================================================
// Warehouse
// =======================================================
Route::get('warehouse/{part_number}', [WarehouseController::class, 'search']);
Route::post('warehouse/update', [WarehouseController::class, 'update']);
Route::post('warehouse/store', [WarehouseController::class, 'store']);

// =======================================================
// Packaging
// =======================================================
Route::get('packaging/{part_number}', [PackagingController::class, 'search']);
Route::post('packaging/update', [PackagingController::class, 'update']);
Route::post('packaging/store', [PackagingController::class, 'store']);
