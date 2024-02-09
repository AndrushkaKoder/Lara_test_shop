<?php

namespace App\Models;

use App\Models\File\Traits\FileRelationTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use FileRelationTrait;

	public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(
			ProductCategory::class, 'link_categories_products',
			'product_id',
			'category_id',
		);
	}
}
