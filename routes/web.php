<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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
    // Route::get('posts', [PostController::class, 'index']);
    // Route::get('posts/add', [PostController::class, 'add'])->name('post.add');

    Route::get('categories', [CategoryController::class, 'index'])->middleware(['can:browse_categories'])->name('category.index');
    Route::get('categories/add', [CategoryController::class, 'add'])->middleware(['can:add_categories'])->name('category.add');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->middleware(['can:edit_categories'])->name('category.edit');
    Route::post('categories/add', [CategoryController::class, 'store'])->middleware(['can:add_categories'])->name('category.store');
    Route::post('categories/update/{id}', [CategoryController::class, 'update'])->middleware(['can:edit_categories'])->name('category.update');

    Route::get('tags', [TagController::class, 'index'])->middleware(['can:browse_tags'])->name('tag.index');
    Route::get('tags/add', [TagController::class, 'add'])->middleware(['can:add_tags'])->name('tag.add');
    Route::get('tags/edit/{id}', [TagController::class, 'edit'])->middleware(['can:edit_tags'])->name('tag.edit');
    Route::post('tags/add', [TagController::class, 'store'])->middleware(['can:add_tags'])->name('tag.store');
    Route::post('tags/update/{id}', [TagController::class, 'update'])->middleware(['can:edit_tags'])->name('tag.update');

    Route::get('features', [FeatureController::class, 'index'])->middleware(['can:browse_features'])->name('feature.index');
    Route::get('features/add', [FeatureController::class, 'add'])->middleware(['can:add_features'])->name('feature.add');
    Route::get('features/edit/{id}', [FeatureController::class, 'edit'])->middleware(['can:edit_features'])->name('feature.edit');
    Route::post('features/add', [FeatureController::class, 'store'])->middleware(['can:add_features'])->name('feature.store');
    Route::post('features/update/{id}', [FeatureController::class, 'update'])->middleware(['can:edit_features'])->name('feature.update');

    Route::get('users', [UserController::class, 'index'])->middleware(['can:browse_users'])->name('user.index');
    Route::get('users/add', [UserController::class, 'add'])->middleware(['can:add_users'])->name('user.add');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->middleware(['can:edit_users'])->name('user.edit');
    Route::post('users/add', [UserController::class, 'store'])->middleware(['can:add_users'])->name('user.store');
    Route::post('users/update/{id}', [UserController::class, 'update'])->middleware(['can:edit_users'])->name('user.update');


    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('posts', [PostController::class, 'index'])->middleware(['can:browse_posts'])->name('post.index');
    Route::get('posts/add', [PostController::class, 'add'])->middleware(['can:add_posts'])->name('post.add');
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->middleware(['can:edit_posts'])->name('post.edit');
    Route::post('posts/add', [PostController::class, 'store'])->middleware(['can:add_posts'])->name('post.store');
    Route::post('posts/update/{post}', [PostController::class, 'update'])->middleware(['can:edit_posts'])->name('post.update');

    Route::get('roles', [RoleController::class, 'index'])->middleware(['can:browse_roles'])->name('role.index');
    Route::get('roles/add', [RoleController::class, 'add'])->middleware(['can:add_roles'])->name('role.add');
    Route::get('roles/edit/{role}', [RoleController::class, 'edit'])->middleware(['can:edit_roles'])->name('role.edit');
    Route::post('roles/add', [RoleController::class, 'store'])->middleware(['can:add_roles'])->name('role.store');
    Route::post('roles/update/{role}', [RoleController::class, 'update'])->middleware(['can:edit_roles'])->name('role.update');
});


Route::post('upload/image', [UploadController::class, 'image'])->name('upload.image');

Route::group(['prefix' => 'admin'], function () {
    // Voyager::routes();
});
