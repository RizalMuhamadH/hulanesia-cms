<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FeatureManagementController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VideoController;
use App\Http\Livewire\Management\FeatureManagement;
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

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    // Route::get('posts', [PostController::class, 'index']);
    // Route::get('posts/add', [PostController::class, 'add'])->name('post.add');
    Route::controller(CategoryController::class)->group(function(){
        Route::get('categories', 'index')->middleware(['can:browse_categories'])->name('category.index');
        Route::get('categories/add', 'add')->middleware(['can:add_categories'])->name('category.add');
        Route::get('categories/edit/{id}', 'edit')->middleware(['can:edit_categories'])->name('category.edit');
        Route::post('categories/add', 'store')->middleware(['can:add_categories'])->name('category.store');
        Route::post('categories/update/{category}', 'update')->middleware(['can:edit_categories'])->name('category.update');
        Route::get('categories/bulk', 'bulk')->middleware(['can:edit_categories'])->name('category.bulk');
    });

    Route::controller(TagController::class)->group(function(){
        Route::get('tags', 'index')->middleware(['can:browse_tags'])->name('tag.index');
        Route::get('tags/add', 'add')->middleware(['can:add_tags'])->name('tag.add');
        Route::get('tags/edit/{id}', 'edit')->middleware(['can:edit_tags'])->name('tag.edit');
        Route::post('tags/add', 'store')->middleware(['can:add_tags'])->name('tag.store');
        Route::post('tags/update/{id}', 'update')->middleware(['can:edit_tags'])->name('tag.update');
        Route::get('tags/bulk', 'bulk')->middleware(['can:edit_tags'])->name('tag.bulk');
        Route::get('tags/search', 'search')->middleware(['can:browse_tags'])->name('tag.search');
    });

    // Route::controller(FeatureController::class)->group(function(){
    //     Route::get('features', 'index')->middleware(['can:browse_features'])->name('feature.index');
    //     Route::get('features/add', 'add')->middleware(['can:add_features'])->name('feature.add');
    //     Route::get('features/edit/{id}', 'edit')->middleware(['can:edit_features'])->name('feature.edit');
    //     Route::post('features/add', 'store')->middleware(['can:add_features'])->name('feature.store');
    //     Route::post('features/update/{id}', 'update')->middleware(['can:edit_features'])->name('feature.update');
    // });

    Route::controller(SettingController::class)->group(function(){
        Route::get('settings', 'index')->middleware(['can:browse_settings'])->name('setting.index');
        Route::get('settings/add', 'add')->middleware(['can:add_settings'])->name('setting.add');
        Route::get('settings/edit/{id}', 'edit')->middleware(['can:edit_settings'])->name('setting.edit');
        Route::post('settings/add', 'store')->middleware(['can:add_settings'])->name('setting.store');
        Route::post('settings/update/{setting}', 'update')->middleware(['can:edit_settings'])->name('setting.update');
        Route::get('settings/bulk', 'bulk')->middleware(['can:edit_settings'])->name('setting.bulk');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('users', 'index')->middleware(['can:browse_users'])->name('user.index');
        Route::get('users/add', 'add')->middleware(['can:add_users'])->name('user.add');
        Route::get('users/edit/{id}', 'edit')->middleware(['can:edit_users'])->name('user.edit');
        Route::post('users/add', 'store')->middleware(['can:add_users'])->name('user.store');
        Route::post('users/update/{id}', 'update')->middleware(['can:edit_users'])->name('user.update');
    });

    Route::controller(ProfileController::class)->group(function(){
        Route::get('profile', 'index')->name('profile.index');
        Route::post('profile/update/{id}', 'update')->name('profile.update');
    });

    Route::controller(PostController::class)->group(function(){
        Route::get('posts', 'index')->middleware(['can:browse_posts'])->name('post.index');
        Route::get('posts/popup', 'popup')->name('post.popup');
        Route::get('posts/add', 'add')->middleware(['can:add_posts'])->name('post.add');
        Route::get('posts/edit/{id}', 'edit')->middleware(['can:edit_posts'])->name('post.edit');
        Route::post('posts/add', 'store')->middleware(['can:add_posts'])->name('post.store');
        Route::post('posts/update/{post}', 'update')->middleware(['can:edit_posts'])->name('post.update');
        Route::get('posts/bulk', 'bulk')->middleware(['can:edit_posts'])->name('post.bulk');
        Route::get('posts/search', 'search')->middleware(['can:browse_posts'])->name('post.search');
        Route::get('posts/analytic', 'analytic')->middleware(['can:browse_posts'])->name('post.analytic');
    });

    Route::get('posts/{slug}', FeatureManagement::class)->middleware(['role:editor|admin'])->name('post.management');

    Route::controller(PhotoController::class)->group(function(){
        Route::get('photos', 'index')->middleware(['can:browse_photos'])->name('photo.index');
        Route::get('photos/add', 'add')->middleware(['can:add_photos'])->name('photo.add');
        Route::get('photos/edit/{id}', 'edit')->middleware(['can:edit_photos'])->name('photo.edit');
        Route::post('photos/add', 'store')->middleware(['can:add_photos'])->name('photo.store');
        Route::post('photos/update/{photo}', 'update')->middleware(['can:edit_photos'])->name('photo.update');
        Route::get('photos/bulk', 'bulk')->middleware(['can:edit_photos'])->name('photo.bulk');
    });

    Route::controller(RoleController::class)->group(function(){
        Route::get('roles', 'index')->middleware(['can:browse_roles'])->name('role.index');
        Route::get('roles/add', 'add')->middleware(['can:add_roles'])->name('role.add');
        Route::get('roles/edit/{role}', 'edit')->middleware(['can:edit_roles'])->name('role.edit');
        Route::post('roles/add', 'store')->middleware(['can:add_roles'])->name('role.store');
        Route::post('roles/update/{role}', 'update')->middleware(['can:edit_roles'])->name('role.update');
    });

    Route::controller(VideoController::class)->group(function(){
        Route::get('videos', 'index')->middleware(['can:browse_videos'])->name('video.index');
        Route::get('videos/add', 'create')->middleware(['can:add_videos'])->name('video.add');
        Route::get('videos/edit/{video}', 'edit')->middleware(['can:edit_videos'])->name('video.edit');
        Route::post('videos/add', 'store')->middleware(['can:add_videos'])->name('video.store');
        Route::post('videos/update/{video}', 'update')->middleware(['can:edit_videos'])->name('video.update');
    });

    Route::controller(ReportController::class)->group(function(){
        Route::get('reports', 'index')->middleware(['can:browse_reports'])->name('report.index');
    });

    
    
    
    
});

Route::post('upload/image', [UploadController::class, 'image'])->name('upload.image');

