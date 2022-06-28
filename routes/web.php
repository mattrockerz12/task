<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//'middleware' => ['auth', 'role:admin'],

Route::group([
    'as' => 'post.',
    'prefix' => 'posts',
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
    'middleware' => 'auth'
], function() {
    Route::get('/', [RoleController::class, 'index'])->middleware(['can:role-list'])->name('index');
    Route::get('/create', [RoleController::class, 'create'])->middleware(['can:role-create'])->name('create');
    Route::post('/store', [RoleController::class, 'store'])->middleware(['can:role-create'])->name('store');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->middleware(['can:role-edit'])->name('edit');
    Route::post('/{id}/update', [RoleController::class, 'update'])->middleware(['can:role-edit'])->name('update');
    Route::post('/{id}/delete', [RoleController::class, 'delete'])->middleware(['can:role-delete'])->name('delete');
    Route::post('/{role}/givePermission', [RoleController::class, 'givePermission'])->name('givePermission');
});

Route::group([
    'as' => 'comment.',
    'prefix' => 'comments',
], function () {
    Route::get('/commentList', [CommentController::class, 'commentList'])->name('commentList');
    Route::post('/store', [CommentController::class, 'store'])->name('store');
});

Route::group([
    'as' => 'permission.',
    'prefix' => 'permissions',
    'middleware' => 'auth'
], function () {
    Route::get('/', [PermissionController::class, 'index'])->middleware(['can:permission-list'])->name('index');
    Route::get('/create', [PermissionController::class, 'create'])->middleware(['can:permission-create'])->name('create');
    Route::post('/store', [PermissionController::class, 'store'])->middleware(['can:permission-create'])->name('store');
    Route::get('/{id}/edit', [PermissionController::class, 'edit'])->middleware(['can:permission-edit'])->name('edit');
    Route::post('/{id}/update', [PermissionController::class, 'update'])->middleware(['can:permission-edit'])->name('update');
    Route::post('/{id}/delete', [PermissionController::class, 'delete'])->middleware(['can:permission-delete'])->name('delete');
});

Route::group([
    'as' => 'user.',
    'prefix' => 'users',
    'middleware' => 'auth'
], function () {
    Route::get('/', [UserController::class, 'index'])->middleware(['can:user-list'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->middleware(['can:user-create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->middleware(['can:user-create'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->middleware('can:user-edit')->name('edit');
    Route::post('/{id}/update', [UserController::class, 'update'])->middleware(['can:user-edit'])->name('update');
    Route::post('/{id}/delete', [UserController::class, 'delete'])->middleware(['can:user-delete'])->name('delete');
});
