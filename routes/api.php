<?php

use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Login - Register Process
Route::post("/login", [LoginController::class, "Login"]);
Route::post("/register", [RegisterController::class, "Register"]);

// ----

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "admin", "middleware" => ["auth:sanctum", "role:1"]], function () {
    Route::get('users', [UserController::class, "getUserData"]);
    Route::post('users', [UserController::class, 'addUserData']);
});

//  admin bareer token :  KFDhwo8KTqjKpBrhxjwn6aqBAWwm4VjUnlsoDN6C

// Restaurant process
Route::get('rest', [RestaurantController::class, 'getRestaurantData']);
Route::post('rest', [RestaurantController::class, 'addResturantData']);
Route::get('rest/{rest_id}', [RestaurantController::class, 'getRestWithId']);
Route::get("rest-table/{rest_id}", [RestaurantController::class, 'getRestTableCount']);
// Products process
Route::post('products', [ProductController::class, 'addProductsData']);

// Menu Process

Route::post('menus', [MenuController::class, "addMenusData"]);
Route::get("menus/{menus_id}", [MenuController::class, "getMenusData"]);

// Photo upload
Route::post('upload', [PhotoController::class, "uploadPhoto"]);

// Basket Controller
Route::group(["middleware" => ["auth:sanctum", "role:3"]], function () {
    Route::post('basket', [BasketController::class, 'addBasket']);
    Route::get("basket", [BasketController::class, 'getBasket']);
    Route::delete("basket", [BasketController::class, 'deleteBasket']);
    Route::post("order", [OrderController::class, 'addOrder']);
    Route::delete("order", [OrderController::class, 'deleteOrders']);
    Route::post("order-detail", [OrderController::class, 'orderDetail']);
    Route::delete("basket/{basket_id}", [BasketController::class, 'deleteBasketRow']);
    Route::get("order", [OrderController::class, 'getOrder']);
    Route::post("isPaid", [OrderController::class, 'updateIsPaid']);
    Route::get("coupon", [CouponController::class, 'getCouponWithUserId']);
});
