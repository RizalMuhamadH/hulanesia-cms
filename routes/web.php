<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/add', [PostController::class, 'add'])->name('post.add');

    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('categories/add', [CategoryController::class, 'add'])->name('category.add');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('categories/add', [CategoryController::class, 'store'])->name('category.store');
    Route::post('categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('tags', [TagController::class, 'index'])->name('tag.index');
    Route::get('tags/add', [TagController::class, 'add'])->name('tag.add');
    Route::get('tags/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
    Route::post('tags/add', [TagController::class, 'store'])->name('tag.store');
    Route::post('tags/update/{id}', [TagController::class, 'update'])->name('tag.update');

    Route::get('features', [FeatureController::class, 'index'])->name('feature.index');
    Route::get('features/add', [FeatureController::class, 'add'])->name('feature.add');
    Route::get('features/edit/{id}', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::post('features/add', [FeatureController::class, 'store'])->name('feature.store');
    Route::post('features/update/{id}', [FeatureController::class, 'update'])->name('feature.update');
});


Route::group(['prefix' => 'admin'], function () {
    // Voyager::routes();
});
