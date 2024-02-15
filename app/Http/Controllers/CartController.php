<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
	public function addToCart(): void
	{
		$product = Product::query()->whereId(request('id'))->firstOrFail();
		session()->push('product', $product->id);
	}

	public function index()
	{
		$productsIds = session()->get('product');
		$products = collect();

		if ($productsIds)
			$products = Product::query()->whereIn('id', $productsIds)->get();

		return view('pages.cart.index', ['products' => $products]);
	}

	public function clearCart(): void
	{
		session()->remove('product');
	}
}
