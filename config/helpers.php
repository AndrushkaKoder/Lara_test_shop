<?php

function correctFilePath(string $filePath): string
{
	return str_replace('\\', '/', $filePath);
}
