<?php

use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\GuestController;
use App\Http\Controllers\Panel\RestManagerController;
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


Route::group(["prefix" => "admin", "middleware" => ["auth", "can:isAdmin", "verified"]], function () {
    Route::get("home", [AdminController::class, 'home'])->name("a-home");
    Route::get("users", [AdminController::class, 'users'])->name("a-users");
    Route::get("add-users-page", [AdminController::class, 'addUsersPage'])->name("add-users-page");
    Route::post("add-users", [AdminController::class, 'addUsers'])->name("add-users");
    Route::post("update-user", [AdminController::class, 'updateUser'])->name("update-user");
    Route::delete("delete-user", [AdminController::class, 'deleteUser'])->name("delete-user");
    Route::get("restaurants", [AdminController::class, 'restaurants'])->name("a-restaurants");
    Route::delete("delete-rest", [AdminController::class, 'deleteRest'])->name("delete-rest");
    Route::get("add-rest-page", [AdminController::class, 'addRestPage'])->name("add-rest-page");
    Route::post("add-rest", [AdminController::class, 'addRest'])->name("add-rest");
    Route::post("upadate-rest", [AdminController::class, 'updateRest'])->name("update-rest");
});

Route::group(["prefix" => "manager", "middleware" => ["auth", "can:isRestaurantManager", "verified"]], function () {

    Route::get("home", [RestManagerController::class, 'home'])->name('r-home');
    Route::get("info-rest", [RestManagerController::class, 'infoRestPage'])->name('info-rest');
    Route::post("update-rest", [RestManagerController::class, 'updateRest'])->name('update-rest-info');
    Route::get("add-menu-page", [RestManagerController::class, 'addMenuPage'])->name("add-menu-page");
    Route::get("add-product-page", [RestManagerController::class, 'addProductPage'])->name('add-product-page');
    Route::post("add-product", [RestManagerController::class, 'addProduct'])->name('add-product');
    Route::get("add-coupon-page", [RestManagerController::class, 'addCouponPage'])->name('add-coupon-page');
    Route::post("add-coupon", [RestManagerController::class, 'addCoupon'])->name("add-coupon");
});

Route::get("edit-user/{id}", [AdminController::class, 'edit']);
Route::get("edit-rest/{id}", [AdminController::class, 'editRestoran']);

Route::get('/', function () {
    return view('auth.login');
});
Route::get("guest/Index", [GuestController::class, "Index"]);

require __DIR__ . '/auth.php';
