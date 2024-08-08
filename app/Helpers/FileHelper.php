<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function saveFile($file, $directory)
    {
        if ($file && $file instanceof \Illuminate\Http\UploadedFile) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($directory, $fileName);
            return url('storage/' . str_replace('public/', '', $path)); // Return full URL
        }

        return null;
    }
}
