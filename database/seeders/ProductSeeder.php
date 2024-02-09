<?php

namespace Database\Seeders;

use App\Models\File\Traits\FileTrait;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
	use FileTrait;

	public function run(): void
	{
		Product::query()->delete();

		$products = $this->getProducts();
		foreach ($products as $product) {
			$this->saveProduct($product);
		}
	}

	private function saveProduct(array $data): void
	{
		$product = new Product();
		$product->fill([
			'title' => $data['title'],
			'description' => $data['description'],
			'price' => $data['price'],
			'count' => $this->getRandomInteger(),
		]);
		$product->save();

		if (isset($data['categories']))
			$this->saveCategories($data, $product);

		if (isset($data['cover']))
			$this->saveCover($data['cover'], $product);

		if (isset($data['photos']))
			$this->savePhotos($data['photos'], $product);
	}

	private function getProducts(): array
	{
		return include_once storage_path('seed/Product/Product.php');
	}

	private function getRandomInteger(): int
	{
		return rand(0, 10);
	}

	private function saveCategories(array $data, Product $product): void
	{
		$productCategories = $data['categories'];

		if ($productCategories) {
			$syncArray = [];
			foreach ($productCategories as $cat) {
				$existCategory = ProductCategory::query()->whereTitle($cat)->first();
				if ($existCategory)
					$syncArray[] = $existCategory->id;
			}
			$product->categories()->sync($syncArray);
		}
	}
}
