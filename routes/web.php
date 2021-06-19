<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

    Route::get('users', [UserController::class, 'index'])->name('user.index');
    Route::get('users/add', [UserController::class, 'add'])->name('user.add');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('users/add', [UserController::class, 'store'])->name('user.store');
    Route::post('users/update/{id}', [UserController::class, 'update'])->name('user.update');


    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('posts', [PostController::class, 'index'])->name('post.index');
    Route::get('posts/add', [PostController::class, 'add'])->name('post.add');
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('posts/add', [PostController::class, 'store'])->name('post.store');
    Route::post('posts/update/{post}', [PostController::class, 'update'])->name('post.update');
});


Route::post('upload/image', [UploadController::class, 'image'])->name('upload.image');

Route::group(['prefix' => 'admin'], function () {
    // Voyager::routes();
});
