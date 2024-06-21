<?php

use App\Models\Club;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::resource('product', ProductController::class);
Route::resource('club', ClubController::class);
Route::get('club-data', [ClubController::class, 'display']);

Route::get('product-data', [ProductController::class, 'display']);

Route::get('fetchClub', [ProductController::class, 'fetchClub']);
Route::get('fetchId', [ProductController::class, 'fetchId']);
Route::get('fetch-id', [ClubController::class, 'fetchId']);


// Route::get('pagination',[ClubController::class,'pagination'])->name('club-page');
Route::get('discount',[ProductController::class,'discount']);
Route::get('/checkExpiry/{id}',[ProductController::class,'checkExpiry']);

Route::get('discount/{id}',[DiscountController::class, 'display']);

