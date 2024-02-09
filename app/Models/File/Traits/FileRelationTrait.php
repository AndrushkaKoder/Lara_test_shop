<?php

namespace App\Models\File\Traits;

use App\Models\File\File;

trait FileRelationTrait
{
	public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(File::class, 'imageable');
	}
}
