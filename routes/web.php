<?php

use App\Http\Controllers\AdminCampaignController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\LocalDataController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductAgreementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDonateController;
use App\Http\Controllers\ProductFavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

// Products
Route::get('/products/', [ProductController::class,'index'])->name('products');
Route::get('/products/{product:id}', [ProductController::class, 'show']);

Route::get('/welcome',function() {
    return view ('welcome');
});

// Owner
Route::middleware('auth')->group(function () {
    Route::get('my/products/', [AdminProductController::class,'index'])->name('my.products');
    Route::post('my/products/',[AdminProductController::class,'store']);

    //Products
    Route::get('my/product/create',[AdminProductController::class,'create'])->name('my.product.create')->middleware('auth');
    Route::get('my/product/{product}/edit',[AdminProductController::class,'edit'])->middleware('auth');
    Route::patch('my/product/{product}',[AdminProductController::class,'update'])->middleware('auth');
    Route::delete('my/product/{product}',[AdminProductController::class,'destroy'])->middleware('auth');

    // Favorites
    Route::get('my/products/favorite/',[ProductFavoriteController::class,'index'])->name('my.products.favorite');
    Route::get('my/products/favorite/{product}',[ProductFavoriteController::class,'show'])->name('my.products.interested');
    Route::post('my/product/favorite/{product}',[ProductFavoriteController::class,'store']);

    // Donations
    Route::get('my/products/donate/',[ProductDonateController::class,'index'])->name('my.products.donate');
    Route::patch('my/products/donate/{product}',[ProductDonateController::class,'update'])->middleware('auth');

    //Agreements
    Route::get('my/products/agreement/',[ProductAgreementController::class,'index'])->name('my.products.agreement');
    Route::get('my/product/agreement/{product}/edit',[ProductAgreementController::class,'edit']);
    Route::patch('my/product/agreement/{product}',[ProductAgreementController::class,'update']);
    Route::delete('my/product/agreement/{product}',[ProductAgreementController::class,'destroy']);

});


// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::get('/dashboard', [AdminPanelController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [AdminPanelController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/users', [AdminPanelController::class, 'users'])->name('admin.users');
    Route::resource('admin/campaigns', AdminCampaignController::class);
    Route::resource('admin/categories', AdminCategoryController::class);
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Newsletter
Route::post('newsletter', NewsletterController::class);

// company
Route::get('/', [LocalDataController::class, 'show'])->name('home');
Route::get('/company/{info}', function ($info) {
    $path = __DIR__ . "/../resources/info/$info.html";

    if (!file_exists($path)) {
        abort(404);
    }

    $body = file_get_contents($path);
    return view('.company.info', [
        'title' => $info,
        'content' => $body
    ]);
});

