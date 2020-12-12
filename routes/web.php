<?php

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



Route::get("/", "HomeController@index")->name("home");

Route::get("/login", "AuthController@login")->name("login");
Route::post("/login", "AuthController@login");

Route::get("/register", "AuthController@register")->name("register");
Route::post("/register", "AuthController@register");

Route::middleware(['check_login_user'])->group(function(){

    Route::get("/profile", "ProfileController@about")->name("profile");
    Route::get("/dashboard", "DashboardController@index")->name("dashboard");

    Route::get("/products", "ProductsController@index")->name("products");
    Route::get("/add_product", "ProductsController@add")->name("add_product");
    Route::post("/add_product", "ProductsController@add");
    Route::get("/edit_product/{id}", "ProductsController@edit")->name("edit_product");
    Route::post("/edit_product/{id}", "ProductsController@edit");
    Route::get("/view_product/{id}", "ProductsController@view")->name("view_product");
    Route::get("/delete_product/{id}", "ProductsController@delete")->name("delete_product");

    Route::get("/orders", "OrdersController@index")->name("orders");
    Route::get("/add_order", "OrdersController@add")->name("add_order");
    Route::post("/add_order", "OrdersController@add");
    Route::get("/edit_order/{id}", "OrdersController@edit")->name("edit_order");
    Route::post("/edit_order/{id}", "OrdersController@edit");
    Route::get("/view_order/{id}", "OrdersController@view")->name("view_order");
    Route::get("/delete_order/{id}", "OrdersController@delete")->name("delete_order");

    Route::get("/report", "ReportController@index")->name("report");
    Route::post("/report", "ReportController@index");

    Route::get("/logout", "AuthController@logout")->name("logout");
});