<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks',[TodosController::class,'index'])->name('tasks');
Route::post('/tasks',[TodosController::class,'store'])->name('tasks');
Route::get('/tasks/{id}', [TodosController::class ,'show'])->name('tasks-edit');
Route::patch('/tasks/{id}',[TodosController::class,'update'])->name('tasks-update');
Route::delete('/tasks/{id}',[TodosController::class,'destroy'])->name('tasks-destroy');
Route::resource('/categories', CategoriesController::class);