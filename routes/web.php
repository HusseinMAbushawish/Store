<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashborde.pages.index');
});

Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{categorie}', [CategorieController::class, 'edit'])->name('categories.edit');
Route::get('/categories/update/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::put('/categories/update/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::get('/categories/delete/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

Route::resource('products',controller: ProductController::class);