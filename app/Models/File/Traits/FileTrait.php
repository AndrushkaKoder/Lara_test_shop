<?php

namespace App\Models\File\Traits;

use App\Models\File\Enum\FileEnum;
use Illuminate\Support\Facades\File;

trait FileTrait
{
	/**
	* Трейт для сохранения файлов по внешним ссылкам
	 */
	private function saveCover(string $file, $model): void
	{
		$type = FileEnum::F_COVER->value;
		$filename = $this->saveImageFromOuterPath($type, $file, $model);
		$this->saveProductImage($model, $filename, $type);
	}

	private function savePhotos(array $files, $model): void
	{
		$type = FileEnum::F_PHOTO->value;
		foreach ($files as $outerFile) {
			$filename = $this->saveImageFromOuterPath($type, $outerFile, $model);
			$this->saveProductImage($model, $filename, $type);
		}
	}

	private function saveImageFromOuterPath(int $fileType, string $outerPath, $model): string
	{
		$file = file_get_contents($outerPath);

		$fileExtension = preg_replace('/^.+\.*\./', '', $outerPath);
		$fileType = $fileType === FileEnum::F_COVER->value ? 'cover' : 'photo';

		$fileDirectory = public_path("System/" . get_class($model) . "/" . $model->id . "/" . $fileType);

		if (!is_dir($fileDirectory))
			File::makeDirectory($fileDirectory, '777', true);

		$filename = md5($outerPath) . ".{$fileExtension}";

		$fullPath = $fileDirectory . '/' . $filename;

		file_put_contents($fullPath, $file);

		return $filename;
	}

	private function saveProductImage($model, string $filename, int $filetype): void
	{
		$model->images()->create([
			'imageable_id' => $model->id,
			'imageable_type' => get_class($model),
			'filename' => $filename,
			'type' => $filetype,
		]);
	}

}
