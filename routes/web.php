<?php

use Illuminate\Support\Facades\Route; 
use App\http\Controllers\UserController;
use App\http\Controllers\ProductController;
use App\http\Controllers\CategoryController;
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

Route::get('/' , [ProductController::class , 'index']);
Route::get('delete_product/{id}', [ProductController::class , 'delete_product']);
Route::get('edit_product/{id}', [ProductController::class , 'edit_product']);
Route::post('update_product/{id}', [ProductController::class , 'update_product']);
Route::get('insert_product', [ProductController::class , 'insert_product']);
Route::post('add_product',[ProductController::class,'add_product']);
Route::get('show_category' , [CategoryController::class , 'show_category']);
Route::post('add_category' , [CategoryController::class , 'add_category']);
Route::get('insert_category' , [CategoryController::class , 'insert_category']);
Route::get('delete_category/{id}' , [CategoryController::class , 'delete_category']);
Route::get('edtit_category/{id}' , [CategoryController::class , 'edit_category']);
Route::post('update_category/{id}' , [CategoryController::class , 'update_category']);
Route::get('/toggle-availability/{record}', function (Product $record) {
    $record->is_avilable = ! $record->is_avilable;
    $record->save();

    return redirect()->back();
})->name('products.toggle-availability');
