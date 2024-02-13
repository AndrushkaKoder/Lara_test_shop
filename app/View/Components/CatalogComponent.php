<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CatalogComponent extends Component
{
	public function render(): View|Closure|string
	{
		$products = Product::query()
			->orderBy('price')
			->limit(10)
			->sAvailable()
			->with('images')
			->get();
		return view('components.catalog-component', ['products' => $products]);
	}
}
