<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/search-products', [ShopController::class, 'search'])
    ->name('search.products');

Route::get('/', function () {
     $featuredCategories = Category::active()
        ->featured()
        ->with([
            'products' => function ($query) {
                $query->active()
                    ->latest()
                    ->take(8);
            }
        ])
        ->orderBy('sort_order')
        ->get();

    return view('home', compact('featuredCategories'));
})->name('home');

Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');

Route::controller(ShopController::class)->group(function () {

    // Shop
    Route::get('/shop', 'index')->name('shop');

    // Category
    Route::get('/category/{slug}', 'category')->name('category');

    // Product
    Route::get('/product/{slug}', 'show')->name('product.show');
});

Route::view('/cart', 'cart')->name('cart');

Route::controller(CheckoutController::class)->group(function () {

    Route::get('/checkout', 'index')->name('checkout');

    Route::post('/checkout/order', 'store')->name('checkout.store');

    Route::post('/payment/success', 'paymentSuccess')->name('payment.success');

    Route::post('/payment/failed', 'paymentFailed')->name('payment.failed');

    Route::get('/order-success/{order}', 'orderSuccess')->name('order.success');

});

Route::get('/page/{slug}', [PageController::class, 'show'])
    ->name('page.show');




Route::fallback(function () {
    return view('404');
});