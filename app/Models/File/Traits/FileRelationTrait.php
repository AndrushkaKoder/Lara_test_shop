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
		$cover =  $this->images()->where('type', FileEnum::F_COVER->value)->firstOrFail();

		if($cover) {
			$path = '/System/' .  get_class($this) . '/' . $this->id . '/cover/' . $cover->filename;
			return correctFilePath($path);
		}
		return null;
	}

	public function getPhotos(): array
	{
		$photos = $this->images()->where('type', FileEnum::F_PHOTO->value)->get();

		if($photos->count()) {
			$photosArray = [];
			foreach ( $photos as $photo) {
				$path = '/System/' .  get_class($this) . '/' . $this->id . '/photo/' . $photo->filename;
				$photosArray[] = correctFilePath($path);
			}
			return $photosArray;
		}
		return [];
	}
}
