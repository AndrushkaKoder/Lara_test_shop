<?php

namespace App\Console\Commands;

use App\Models\File\File;
use Illuminate\Console\Command;

class Run extends Command
{
	protected $signature = 'app:run';

	protected $description = 'Запуск миграций, сидинг данных в таблицы';

	public function handle()
	{
		File::query()->delete();
		\Illuminate\Support\Facades\File::deleteDirectory(public_path('System'));

		$this->call('migrate:fresh');
		$this->call('db:seed');
	}
}
