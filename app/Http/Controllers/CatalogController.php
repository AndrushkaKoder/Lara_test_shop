<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class CatalogController extends Controller
{
	public function index()
	{
		$categories = ProductCategory::all();
		return view('pages.catalog.index', ['categories' => $categories]);
	}

	public function show(string $slug)
	{
		$category = ProductCategory::query()->where('slug', $slug)
			->with(['products' => function($query) {
				return $query->with('images');
			}])
			->firstOrFail();

		return view('pages.catalog.show', ['category' => $category]);
	}

	public function product(string $slug)
	{
		$product = Product::query()
			->where('slug', $slug)
			->firstOrFail();

		return view('pages.catalog.products.index', ['product' => $product]);
	}
}
