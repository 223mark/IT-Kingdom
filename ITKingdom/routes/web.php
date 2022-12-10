<?php

use App\Http\Controllers\Accessories\AccessoriesController;
use App\Http\Controllers\Accessories\ProductTypeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\LaptopCategoryController;
use App\Http\Controllers\Category\PhoneCategoryController;
use App\Http\Controllers\PostCategroyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\AboutUserController;
use App\Http\Controllers\User\LaptopController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PhoneController;
use App\Models\Accessories;
use App\Models\Laptop;
use App\Models\PostCategory;
use App\Models\ProductType;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get(
        '/dashboard',
        [AdminController::class, 'profile']
    )->name('dashboard');
    //Profile section or usersection
    Route::post('update/profile', [AdminController::class, 'updateProfile'])->name('admin#profileUpdate');
    Route::get('changePassword/page', [AdminController::class, 'changePswPage'])->name('admin#passwordChangePage');
    Route::post('password/Change', [AdminController::class, 'changePassword'])->name('admin#passwordChange');
});
//category managment || brand managment
Route::middleware(['auth:sanctum'])->prefix('category')->group(function () {
    //main categroy page
    Route::get('home', [CategoryController::class, 'category'])->name('admin#category');

    //phone category section
    Route::get('phone', [PhoneCategoryController::class, 'categoryPage'])->name('admin#phoneCategory');
    Route::post('phone/add', [PhoneCategoryController::class, 'addCategory'])->name('admin#addphoneCategory');
    Route::get('phone/update/page/{id}', [PhoneCategoryController::class, 'phoneCategoryUpdatePage'])->name('admin#phoneCategoryUpdatePage');
    Route::post('phone/update/{id}', [PhoneCategoryController::class, 'phoneCategoryUpdate'])->name('admin#phoneCategoryUpdate');

    //LAPTOP CATEGORY
    Route::get('laptop', [LaptopCategoryController::class, 'categoryPage'])->name('admin#laptopCategoryPage');
    Route::post('laptop/add', [LaptopCategoryController::class, 'addCategory'])->name('admin#addlaptopCategory');
    Route::get('laptop/update/page/{id}', [LaptopCategoryController::class, 'laptopCategoryUpdatePage'])->name('admin#laptopCategoryUpdatePage');
    Route::post('laptop/update/{id}', [LaptopCategoryController::class, 'laptopCategoryUpdate'])->name('admin#laptopCategoryUpdate');


    //post category
    Route::get('post/index', [PostCategroyController::class, 'index'])->name('admin#postCategoryIndex');
    Route::post('post/add', [PostCategroyController::class, 'addPostCategory'])->name('admin#postCategoryAdd');
    Route::get('post/edit/{id}', [PostCategroyController::class, 'editPostCategory'])->name('admin#editPostCategoryPage');
    Route::post('post/update/{id}', [PostCategroyController::class, 'updatePostCategory'])->name('admin#updatePostCategory');


    //other product or accessories category
    Route::get('other/', [ProductTypeController::class, 'index'])->name('admin#productTypeIndex');
    Route::post('add/product', [ProductTypeController::class, 'addType'])->name('admin#addProductType');
});


//phone managment
Route::middleware(['auth:sanctum'])->prefix('phone')->group(function () {
    Route::get('list', [PhoneController::class, 'index'])->name('phoneList#index');
    Route::get('add/page', [PhoneController::class, 'addPhonePage'])->name('admin#phoneAddPage');
    Route::post('add', [PhoneController::class, 'addPhone'])->name('admin#addPhone');
    Route::get('editPage/{id}', [PhoneController::class, 'phoneEdit'])->name('admin#phoneEdit');
    Route::post('update/{id}', [PhoneController::class, 'phoneUpdate'])->name('admin#phoneUpdate');
    Route::post('search', [PhoneController::class, 'phoneSearch'])->name('admin#phoneSearch');
});


//Laptop Managment
Route::middleware(['auth:sanctum'])->prefix('laptop')->group(function () {
    Route::get('index', [LaptopController::class, 'index'])->name('admin#laptopIndex');
    Route::get('add/page', [LaptopController::class, 'addLaptopPage'])->name('admin#addLaptopPage');
    Route::post('add', [LaptopController::class, 'addLaptop'])->name('admin#addLaptop');
    Route::get('edit{id}', [LaptopController::class, 'editLaptop'])->name('admin#editlaptopPage');
    Route::post('update/{id}', [LaptopController::class, 'updateLaptop'])->name('admin#updateLaptop');
    Route::post('search', [LaptopController::class, 'searchLaptop'])->name('admin#searchLaptop');
});


//user status and order status section
Route::middleware(['auth:sanctum'])->prefix()->group(function () {
    Route::get('user/index', [AboutUserController::class, 'index'])->name('admin#userList');
    Route::post('user/search', [AboutUserController::class, 'searchUser'])->name('admin#searchUser');
    Route::get('user/getuserorder/{id}', [AboutUserController::class, 'getuserOrder'])->name('admin#userOrder');
});



//post managment
Route::middleware(['auth:sanctum'])->prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('admin#postIndex');
    Route::post('create', [PostController::class, 'createPost'])->name('admin#createPost');
    Route::get('edit/{id}', [PostController::class, 'editPost'])->name('admin#postEdit');
});


//other product or accessories
Route::middleware(['auth:sanctum'])->prefix('accessories')->group(function () {
    Route::get('page', [AccessoriesController::class, 'index'])->name('admin#accessoriesIndex');
    Route::get('addPage', [AccessoriesController::class, 'addProductPage'])->name('admin#addProductPage');
    Route::post('add', [AccessoriesController::class, 'addProduct'])->name('admin#addProduct');
    Route::post('search', [AccessoriesController::class, 'searchAccessories'])->name('admin#searchAccessories');
});

//order managment
Route::middleware(['auth:sanctum'])->prefix('order')->group(function () {
    Route::get('get', [AdminOrderController::class, 'getOrder'])->name('admin#getOrder');
    Route::post('searchUser', [AdminOrderController::class, 'searchUser'])->name('admin#ordersearchUser');
    Route::post('status/{id}', [AdminOrderController::class, 'setStatus'])->name('admin#setOrderStatus');
    Route::get('delete/{id}', [AdminOrderController::class, 'orderDelete'])->name('admin#orderDelete');
    Route::post('filter', [AdminOrderController::class, 'filteredorders'])->name('admin#filteredOrders');
    Route::get('delied/alldelete', [AdminOrderController::class, 'delieveredAlldelete'])->name('admin#delieveredAlldelete');
});
