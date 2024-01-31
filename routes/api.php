<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Api\ProductController;
use App\http\Controllers\Api\CategoryController;

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

Route::get('/index' , [ProductController::class , 'show_product']);
Route::get('delete_product/{id}', [ProductController::class , 'delete_product']);
Route::get('edit_product/{id}', [ProductController::class , 'edit_product']);
Route::post('update_product/{id}', [ProductController::class , 'update_product']);
Route::get('insert_product', [ProductController::class , 'insert_product']);
Route::post('add_product',[ProductController::class,'add_product']);
Route::get('show_category' , [CategoryController::class , 'show_category']);
Route::post('add_category' , [CategoryController::class , 'add_category']);
Route::get('delete_category/{id}' , [CategoryController::class , 'delete_category']);
Route::post('update_category/{id}' , [CategoryController::class , 'update_category']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
