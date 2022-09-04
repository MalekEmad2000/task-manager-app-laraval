<?php

use Illuminate\Support\Facades\Route;

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



//Route::get("/",[\App\Http\Controllers\ProductsController::class,'index'])->name('products.index');
//Route::get("/create",[\App\Http\Controllers\ProductsController::class,'create'])->name('products.create');
//Route::get("/show",[\App\Http\Controllers\ProductsController::class,'show'])->name('products.show');
//Route::post("/store",[\App\Http\Controllers\ProductsController::class,'store'])->name('products.store');
//Route::get("/edit/{id}",[\App\Http\Controllers\ProductsController::class,'edit'])->name('products.edit');
//Route::post("/update/{id}",[\App\Http\Controllers\ProductsController::class,'update'])->name('products.update');


Route::get("/",[\App\Http\Controllers\TasksController::class,'index'])->name('tasks.index');
Route::get("/create",[\App\Http\Controllers\TasksController::class,'create'])->name('tasks.create');
Route::get("/show",[\App\Http\Controllers\TasksController::class,'show'])->name('tasks.show');
Route::post("/store",[\App\Http\Controllers\TasksController::class,'store'])->name('tasks.store');
Route::get("/edit/{id}",[\App\Http\Controllers\TasksController::class,'edit'])->name('tasks.edit');
Route::post("/update/{id}",[\App\Http\Controllers\TasksController::class,'update'])->name('tasks.update');
Route::get("/delete/{id}",[\App\Http\Controllers\TasksController::class,'destroy'])->name('tasks.delete');




Route::get("/familly",[\App\Http\Controllers\FamilliesController::class,'index'])->name('famillies.index');
Route::get("/familly/create",[\App\Http\Controllers\FamilliesController::class,'create'])->name('famillies.create');
Route::post("/familly/store",[\App\Http\Controllers\FamilliesController::class,'store'])->name('famillies.store');
Route::get("/familly/show",[\App\Http\Controllers\FamilliesController::class,'show'])->name('famillies.show');
Route::get("/familly/createTask",[\App\Http\Controllers\FamilliesController::class,'createTask'])->name('famillies.createTask');
Route::post("/familly/storeTask",[\App\Http\Controllers\FamilliesController::class,'storeTask'])->name('famillies.storeTask');
Route::get("/familly/addMember",[\App\Http\Controllers\FamilliesController::class,'addMember'])->name('famillies.addMember');
Route::post("/familly/updateStatus",[\App\Http\Controllers\FamilliesController::class,'insertMember'])->name('famillies.insertMember');
Route::get("/familly/kick/{id}",[\App\Http\Controllers\FamilliesController::class,'kick'])->name('famillies.kick');
Route::get("/familly/delete/{id}",[\App\Http\Controllers\FamilliesController::class,'destroy'])->name('famillies.delete');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
