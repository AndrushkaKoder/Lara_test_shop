<?php

namespace App\Models\File\Traits;

use App\Models\File\Enum\FileEnum;
use App\Models\File\File;

trait FileRelationTrait
{
	/*
	 * Трейт для получения полиморфного отношения и путей к файлам
	 */

	public function images(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(File::class, 'imageable');
	}

	public function getCover(): ?string
	{
		$coverName =  $this->images()->where('type', FileEnum::F_COVER->value)->firstOrFail();

		if($coverName) {
			$path = '/System/' .  get_class($this) . '/' . $this->id . '/cover/' . $coverName->filename;
			return correctFilePath($path);
		}
		return null;
	}

	public function getPhotos(): array
	{
		$photos = $this->images()->where('type', FileEnum::F_PHOTO->value)->get();

		return $photos->count() ? $photos->toArray() : [];
	}
}
