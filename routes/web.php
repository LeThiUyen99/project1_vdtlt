<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/about', function () {
    return view('layer.about');
});
Route::get('/search', [Controller::class, 'search']);
Route::get('/post', [Controller::class, 'post'])->name('layer.post');
Route::post('/savepost', [Controller::class, 'savepost'])->name('layer.savepost');
Route::get('/detail/{id}', [Controller::class, 'detail'])->name('layer.detail');
Route::get('/', [Controller::class, 'layer'])->name('layer.layer');
Route::get('/login', [Controller::class, 'login'])->name('layer.login');
Route::get('/loginPross', [Controller::class, 'loginPross'])->name('layer.loginPross');
Route::get('/logout', [Controller::class, 'logout'])->name('layer.logout');
Route::get('/loginAdmin', [Controller::class, 'loginAdmin'])->name('layer.loginAdmin');
Route::get('/loginAdminPross', [Controller::class, 'loginAdminPross'])->name('layer.loginAdminPross');
Route::get('/logoutAdmin', [Controller::class, 'logoutAdmin'])->name('layer.logoutAdmin');
Route::get('/signup', [Controller::class, 'signup'])->name('layer.signup');
Route::get('/signupPross', [Controller::class, 'signupPross'])->name('layer.signupPross');
Route::get('/cate', [Controller::class, 'cate'])->name('layer.cate');
Route::get('/blogcate', [Controller::class, 'blogcate'])->name('layer.blogcate');

Route::resource('admins', AdminController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('accounts', AccountController::class)->middleware('auth');
Route::resource('blogs', BlogController::class)->middleware('auth');

Route::prefix('Blog')->group(function () {
    Route::get('/', [PostController::class, 'list'])->name('Blog.list');

    Route::get('/create', [PostController::class, 'create'])->name('Blog.create');
    Route::get('/store', [PostController::class, 'store'])->name('Blog.store');
});
//Route::prefix('Category')->group(function () {
//    Route::get('/', [CategoryController::class, 'categoryList'])->name('Category.categoryList');
//
//    Route::get('/categoryAdd', [CategoryController::class, 'categoryAdd'])->name('Category.categoryAdd');
//    Route::get('/categorySave', [CategoryController::class,'categorySave'])->name('Category.categorySave');
//
//    Route::get('/categoryEdit/{categoryId}', [CategoryController::class, 'categoryEdit'])->name('Category.categoryEdit');
//    Route::get('/categoryUpdate/{id}', [CategoryController::class,'categoryUpdate'])->name('Category.categoryUpdate');
//
//    Route::get('/categoryDelete/{categoryId}', [CategoryController::class, 'categoryDelete'])->name('Category.categoryDelete');
//});

//Route::prefix('Blog')->group(function () {
//    Route::get('/', [BlogController::class, 'blogList'])->name('Blog.blogList');
//
//    Route::get('/blogAdd', [BlogController::class, 'blogAdd'])->name('Blog.blogAdd');
//    Route::post('/blogSave', [BlogController::class, 'blogSave'])->name('Blog.blogSave');
//
//    Route::get('/blogEdit/{id}', [BlogController::class, 'blogEdit'])->name('Blog.blogEdit');
//    Route::put('/blogUpdate/{id}', [BlogController::class,'blogUpdate'])->name('Blog.blogUpdate');
//
//    Route::get('/blogDelete/{blogId}', [BlogController::class, 'blogDelete'])->name('Blog.blogDelete');
//});

//Route::prefix('Account')->group(function () {
//    Route::get('/', [AccountController::class, 'accountList'])->name('Account.accountList');
//
//    Route::get('/accountAdd', [AccountController::class, 'accountAdd'])->name('Account.accountAdd');
//    Route::get('/accountSave', [AccountController::class, 'accountSave'])->name('Account.accountSave');
//});

//Route::prefix('Admin')->group(function () {
//    Route::get('/', [AdminController::class, 'adminList'])->name('Admin.adminList');
//});

