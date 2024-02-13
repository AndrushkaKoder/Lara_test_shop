<?php

namespace App\Models;

use App\Models\File\Traits\FileRelationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
	use FileRelationTrait;

	protected $fillable = [
		'title',
		'description',
		'count',
		'slug',
		'price',
	];

	public function setSlugAttribute(): void
	{
		$this->attributes['slug'] = Str::slug($this->attributes['title']);
	}

	public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(
			ProductCategory::class, 'link_categories_products',
			'product_id',
			'category_id',
		);
	}

	public function scopeSAvailable($query)
	{
		return $query->where('count', '>', 0);
	}

	public function getPrice(): string
	{
		return intval($this->price) . " ₽";
	}

	public function getCategories(): string
	{
		return implode(' / ', array_map(function ($category) {
			return $category['title'];
		}, $this->categories->toArray()));
	}
}
