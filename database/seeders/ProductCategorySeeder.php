<?php

namespace Database\Seeders;

use App\Models\File\Traits\FileTrait;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
	use FileTrait;

	public function run(): void
	{
		ProductCategory::query()->delete();

		$categories = $this->getCategories();

		foreach ($categories as $category) {
			$newCategory = new ProductCategory();
			$newCategory->fill([
				'title' => $category['title']
			])->save();

			if (isset($category['cover']))
				$this->saveCover($category['cover'], $newCategory);
		}
	}

	private function getCategories(): array
	{
		return include_once storage_path('seed/ProductCategory/ProductCategory.php');
	}
}
