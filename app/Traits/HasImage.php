<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function uploadImage($file, $path)
    {
        $file->storeAs('public/img/'.$path, $file->hasName());
    }

    public function removeImage($file, $path)
    {
        Storage::disk('local')->delete('public/img/'.$path.'/'.basename($file));
    }
}

