<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('getPrice', [\App\Http\Controllers\Auth\AdminController::class, 'getPrice']);
Route::get('aa', [\App\Http\Controllers\PublicController::class, 'aa']);
Route::get('aa2', [\App\Http\Controllers\PublicController::class, 'aa2']);
Route::get('get_all_products', [\App\Http\Controllers\ProductController::class, 'get_all_products']);

Route::post('add_product_by_name', [\App\Http\Controllers\Auth\AdminController::class, 'add_product_by_name']);

Route::prefix('admin')->group(function () {
    Route::post('register', [\App\Http\Controllers\Auth\AdminController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Auth\AdminController::class, 'login']);
    Route::middleware(['auth:admin-api'])->group(function () {
        Route::get('info', function () {
            return response()->json([
                'data' => \Illuminate\Support\Facades\Auth::user(),
                'message' => 'success'
            ]);
        });
        // product crud
        Route::get('get_all_company_products', [\App\Http\Controllers\Auth\AdminController::class, 'get_all_company_products']);
        Route::get('get_pharmacy_products', [\App\Http\Controllers\Auth\AdminController::class, 'get_pharmacy_products']);
        Route::get('add_product_by_id/{product_id}', [\App\Http\Controllers\Auth\AdminController::class, 'add_product_by_id']);
        Route::delete('delete_product_by_id/{product_id}', [\App\Http\Controllers\Auth\AdminController::class, 'delete_product_by_id']);
        Route::post('edit_product_by_id/{product_id}', [\App\Http\Controllers\Auth\AdminController::class, 'edit_product_by_id']);
        // info
        Route::post('add_info/{product_id}', [\App\Http\Controllers\Auth\AdminController::class, 'add_info']);
        Route::post('smart_add_quantities', [\App\Http\Controllers\Auth\AdminController::class, 'smart_add_quantities']);
        //bill
        Route::post('create_bill', [\App\Http\Controllers\Auth\AdminController::class, 'create_bill']);
        Route::get('getBill', [\App\Http\Controllers\Auth\AdminController::class, 'getBill']);
        Route::get('get_bill_info/{bill_id}', [\App\Http\Controllers\Auth\AdminController::class, 'get_bill_info']);
        // favorites crud
        Route::get('add_favorite/{favorite_id}', [\App\Http\Controllers\PublicController::class, 'add_favorite']);
        Route::get('get_favorite', [\App\Http\Controllers\PublicController::class, 'get_favorite']);
        Route::delete('delete_favorite/{favorite_id}', [\App\Http\Controllers\PublicController::class, 'delete_favorite']);
        // rate crud
        Route::post('add_rate/{rated_id}', [\App\Http\Controllers\PublicController::class, 'add_rate']);
        Route::post('edit_rate/{rated_id}', [\App\Http\Controllers\PublicController::class, 'edit_rate']);
        Route::delete('delete_rate/{rated_id}', [\App\Http\Controllers\PublicController::class, 'delete_rate']);
    });
});

Route::prefix('company')->group(function () {
    Route::post('register', [\App\Http\Controllers\Auth\CompanyController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Auth\CompanyController::class, 'login']);
    Route::middleware(['auth:company-api'])->group(function () {
        Route::get('info', function () {
            return response()->json([
                'data' => \Illuminate\Support\Facades\Auth::user(),
                'message' => 'success'
            ]);
        });
        Route::post('add_product', [\App\Http\Controllers\Auth\CompanyController::class, 'add_product']);
        Route::get('get_company_products', [\App\Http\Controllers\Auth\CompanyController::class, 'get_company_products']);
    });
});


Route::prefix('client')->group(function () {
    Route::post('register', [\App\Http\Controllers\Auth\ClientController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Auth\ClientController::class, 'login']);
    Route::middleware(['auth:client-api'])->group(function () {
    
        Route::get('get_pharmacy', [\App\Http\Controllers\Auth\ClientController::class, 'get_pharmacy']);
        Route::get('get_pharmacy_product/{admin_id}', [\App\Http\Controllers\Auth\ClientController::class, 'get_pharmacy_product']);
        Route::get('sorted_loctation_pharmacy', [\App\Http\Controllers\Auth\ClientController::class, 'sorted_loctation_pharmacy']);

        Route::post('get_pharmacies_by_location', [\App\Http\Controllers\Auth\ClientController::class, 'get_pharmacies_by_location']);
        
        // favorites crud
        Route::get('add_favorite/{favorite_id}', [\App\Http\Controllers\PublicController::class, 'add_favorite']);
        Route::get('get_favorite', [\App\Http\Controllers\PublicController::class, 'get_favorite']);
        Route::delete('delete_favorite/{favorite_id}', [\App\Http\Controllers\PublicController::class, 'delete_favorite']);
        // rate crud
        Route::post('add_rate/{rated_id}', [\App\Http\Controllers\PublicController::class, 'add_rate']);
        Route::post('edit_rate/{rated_id}', [\App\Http\Controllers\PublicController::class, 'edit_rate']);
        Route::delete('delete_rate/{rated_id}', [\App\Http\Controllers\PublicController::class, 'delete_rate']);
    });
});
