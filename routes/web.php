<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,"index"])->name('homepage');


Route::prefix("user")->group(function(){

});
Route::prefix("admin")->group(function(){

    Route::get('/',[AdminController::class,"dashboard"])->name("admin.dashboard");
    Route::resources([
        'category'=>CategoryController::class,
        'products'=>ProductController::class,
    ]);
});
Route::prefix("auth")->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::match(["get","post"],"/login","login")->name("login");
        Route::match(["get","post"],"/register","register")->name("register");
        Route::get("/logout","logout")->name("logout");
    });
});

Route::get('/add-to-cart/{product_slug}',[OrderController::class,"addToCart"])->name("addToCart")->middleware('auth');
Route::get('/remove-from-cart/{product_slug}',[OrderController::class,"removeFromCart"])->name("removeFromCart")->middleware('auth');
Route::get('/cart',[OrderController::class,"showCart"])->name("cart")->middleware('auth');

Route::get('/{category}/{slug}',[HomeController::class,"viewProduct"])->name('view.product');
Route::get('/{slug}',[HomeController::class,"filter"])->name('view.filter');
