<?php

use App\Models\Club;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProductController;
use App\Models\Products;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('product',[ProductController::class,'displayProduct'])->name('product');
// Route::get('club',[ClubController::class,'displayClub'])->name('club');

// Route::get('club-table',function(){

//     $data = Club::all();
//     return view('club',compact('data'));
// })->name('club-table');


// Route::get('product-table',function(){

//     $data = Products::all();
//     return view('product',compact('data'));
// })->name('product-table');



// Route::post('club-submit',[ClubController::class,'submitClub'])->name('submitClub');


Route::resource('product', ProductController::class);
Route::resource('club', ClubController::class);
Route::get('club-data', [ClubController::class, 'display']);

Route::get('product-data', [ProductController::class, 'display']);
// Route::post('product',[ProductController::class,'store'])->name('product.store');
// Route::put('product/{product}',[ProductController::class,'update'])->name('product.update');
Route::get('fetchClub', [ProductController::class, 'fetchClub']);
Route::get('fetchId', [ProductController::class, 'fetchId']);
Route::get('fetch-id', [ClubController::class, 'fetchId']);
