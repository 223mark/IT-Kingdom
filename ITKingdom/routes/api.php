<?php

use App\Http\Controllers\Api\AllProductController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\LaptopController;
use App\Http\Controllers\Api\MyCartController;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\OrderController;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//user auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/user/update', [AuthController::class, 'updateUser']);
Route::post('/user/passwrodChange', [AuthController::class, 'updatePassword']);


//phone
Route::get('/allPhone', [PhoneController::class, 'getAllPhone']);
//phone detail
Route::post('/phoneDetail', [PhoneController::class, 'getDetail']);
//phonecategory
Route::get('/phoneCategories', [PhoneController::class, 'getPhoneCategories']);


//laptop
Route::get('/allLaptop', [LaptopController::class, 'getAllLaptop']);
Route::post('/laptopDetail', [LaptopController::class, 'getDetail']);
Route::get('/laptopBrands', [LaptopController::class, 'getBrand']);

//all products
Route::get('get/productType', [AllProductController::class, 'getProductType']);
Route::get('get/accerrories', [AllProductController::class, 'getAccess']);
Route::post('get/productDetail', [AllProductController::class, 'getDetail']);


//cart
Route::post('/addCart', [MyCartController::class, 'addToCart']);
Route::post('/getMyCart', [MyCartController::class, 'getmyCart']);
Route::post('delete/cart', [MyCartController::class, 'deleteCart']);

//order
Route::post('/add/order', [ApiOrderController::class, 'addOrder']);
//get order
Route::post('get/order', [ApiOrderController::class, 'getOrder']);
