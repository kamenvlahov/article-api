<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class FileUploaderService
{
    public static function saveUpload($uploadedFile): string
    {
        $filename = time() . $uploadedFile->getClientOriginalName();
        Storage::putFileAs(
            Image::STORAGE,
            $uploadedFile,
            $filename,
            'public'
        );
        return $filename;
    }

    public static function deleteFile(Image $image): bool
    {
        return Storage::delete(Image::STORAGE . $image->url);
    }
}
