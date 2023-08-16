<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Home;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontEndController;



Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'postlogin'])->name('login.ok'); 
});

Route::prefix('admin')->middleware(['check.login', 'auth'])->group(function () {
    Route::get('home', [HomeController::class, 'gethome'])->name('admin.home');
    Route::group(['prefix'=>'category'],function()
    {
        Route::get('/', [CategoryController::class, 'getcate']);
        Route::post('/', [CategoryController::class, 'postcate']);
        Route::get('edit/{id}', [CategoryController::class, 'geteditcate']);
        Route::post('edit/{id}', [CategoryController::class, 'posteditcate']);
        Route::get('delete/{id}', [CategoryController::class, 'getdeletecate']);
    });
    Route::group(['prefix'=>'product'],function(){
        Route::get('/', [ProductController::class, 'getproduct']);
        Route::get('add', [ProductController::class, 'getaddproduct']);
        Route::post('add', [ProductController::class, 'postaddproduct']);
        Route::get('edit/{id}', [ProductController::class, 'geteditproduct']);
        Route::post('edit/{id}', [ProductController::class, 'posteditproduct']);
        Route::get('delete/{id}', [ProductController::class, 'getdeleteproduct']);
    });
});

Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}', [CartController::class, 'getaddcart']);
    Route::get('show', [CartController::class, 'getshowcart']);
    Route::get('delete/{id}', [CartController::class, 'getdeletecart']);
    Route::post('/update-quantity', [CartController::class, 'updateQuantity'])
    ->name('cart.updateQuantity');
    Route::post('show', [CartController::class, 'postcomplete']);
});

Route::get('/', [FrontEndController::class, 'gethome']);

Route::get('details/{id}/{slug}.html', [FrontEndController::class, 'getdetail']);

Route::post('details/{id}/{slug}.html', [FrontEndController::class, 'postcomment']);

Route::get('category/{id}/{slug}.html', [FrontEndController::class, 'getcategory']);

Route::get('search', [FrontEndController::class, 'getsearch']);
