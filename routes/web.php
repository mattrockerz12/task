<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'as' => 'post.',
    'prefix' => 'posts',
    'middleware' => ['auth', 'role:admin'],
], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/postList', [PostController::class, 'postList'])->name('postList');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [PostController::class, 'update'])->name('update');
    Route::post('/{id}/delete', [PostController::class, 'delete'])->name('delete');
    Route::get('/{id}/show', [PostController::class, 'show'])->name('show');
});

Route::group([
    'as' => 'role.',
    'prefix' => 'roles',
], function() {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('/create', [RoleController::class, 'create'])->name('create');
    Route::post('/store', [RoleController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [RoleController::class, 'update'])->name('update');
    Route::post('/{id}/delete', [RoleController::class, 'delete'])->name('delete');
    Route::post('/{role}/givePermission', [RoleController::class, 'givePermission'])->name('givePermission');
});

Route::group([
    'as' => 'comment.',
    'prefix' => 'comments',
], function () {
    Route::post('/store', [CommentController::class, 'store'])->name('store');
});

Route::group([
    'as' => 'permission.',
    'prefix' => 'permissions',
], function () {
    Route::get('/', [PermissionController::class, 'index'])->name('index');
    Route::get('/create', [PermissionController::class, 'create'])->name('create');
    Route::post('/store', [PermissionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [PermissionController::class, 'update'])->name('update');
    Route::post('/{id}/delete', [PermissionController::class, 'delete'])->name('delete');
});
