<?php

namespace App\Models;

use App\Models\File\Traits\FileRelationTrait;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	use FileRelationTrait;

	protected $fillable = [
		'title'
	];

	public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(
			Product::class,
			'link_categories_products',
			'category_id',
			'product_id'
		);
	}
}
