<?php

use App\Http\Controllers\AdminCategoryController;
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
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

// Products
Route::get('/products/', [ProductController::class,'index'])->name('products');
Route::get('/products/{product:id}', [ProductController::class, 'show']);

Route::get('/welcome',function() {
    return view ('welcome');
});

// Google OAuth
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExists = User::where('external_id',$user->id)->where('external_auth','google')->first();
    if ($userExists) {
        Auth::login($userExists);
    } else {
        $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make('smile'),
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);

        Auth::login($newUser);
    }
    return redirect ('/');
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
    Route::get('/my/products/agreement/',[ProductAgreementController::class,'index'])->name('my.products.agreement');
    Route::get('/my/product/agreement/{product}/edit',[ProductAgreementController::class,'edit']);
    Route::patch('/my/product/agreement/{product}',[ProductAgreementController::class,'update']);
    Route::delete('/my/product/agreement/{product}',[ProductAgreementController::class,'destroy']);

});


// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::get('/dashboard', [AdminPanelController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [AdminPanelController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/users', [AdminPanelController::class, 'users'])->name('admin.users');
    Route::get('/admin/products', [AdminPanelController::class, 'products'])->name('admin.products');

// Campaign Section
    Route::get('/admin/campaigns', [AdminCampaignController::class, 'index']);
    Route::post('/admin/campaigns/store', [AdminCampaignController::class, 'store']);
    Route::post('/admin/campaigns/edit', [AdminCampaignController::class, 'edit']);
    Route::post('/admin/campaigns/delete', [AdminCampaignController::class, 'destroy']);
    //Route::resource('admin/campaigns', AdminCampaignController::class)->except(['show',]);

// Category Section
    Route::get('/admin/categories', [AdminCategoryController::class, 'index']);
    Route::post('/admin/categories/store', [AdminCategoryController::class, 'store']);
    Route::post('/admin/categories/edit', [AdminCategoryController::class, 'edit']);
    Route::post('/admin/categories/delete', [AdminCategoryController::class, 'destroy']);
    //Route::resource('admin/categories', AdminCategoryController::class);
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

