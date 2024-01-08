<?php

use App\Models\Test;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/testmodel',function(){
    $test = Test::findOrFail(1);
    dd($test);
});
Route::get('/testmodel',function(){
    $test = DB::table('test')->where('id', 1)->first();
    dd($test);
});
Route::get('/testuser',function(){
    $user = User::findOrFail(1);
    dd($user);
});
Route::get('/testuser',function(){
    $user = DB::table('users')->where('id', 1)->first();
    dd($user);
});

    Route::get('/category', [CategoryController::class, 'index'])->name("category.list");
    Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");
    Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

    Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');
    Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

    Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");


    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
    Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');


    // Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name("customer.list");
    Route::get('/customer/create', [CustomerController::class, 'create'])->name("customer.create");
    Route::post('/customer', [CustomerController::class, 'store'])->name("customer.store");

    Route::get("/customer/{customerId}/edit", [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put("/customer/{customerId}", [CustomerController::class, 'update'])->name('customer.update');

    Route::delete("/customer/{customerId}", [CustomerController::class, 'destroy'])->name('customer.delete');
    Route::get('/customer/{customerId}', [CustomerController::class, 'show'])->name("customer.show");
