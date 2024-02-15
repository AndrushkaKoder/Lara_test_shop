<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('pages.home.index');
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{slug}', [CatalogController::class, 'show'])
	->name('catalog.show')
	->where('slug', '[a-z]+');

Route::get('/catalog/product/{slug}', [CatalogController::class, 'product'])->name('product.show');

Route::post('/cart', [CartController::class, 'addToCart']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
