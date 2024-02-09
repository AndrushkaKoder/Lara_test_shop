<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $fillable = [
		'imageable_id',
		'imageable_type',
		'filename',
		'type'
	];


	public function imageable(): \Illuminate\Database\Eloquent\Relations\MorphTo
	{
		return $this->morphTo();
	}
}
