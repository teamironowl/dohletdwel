<?php

namespace App\Service;

use Carbon\Carbon;

class FileUploadService
{
    public function __construct()
    {
        $request = request();
    }

    public function locateFile($file)
    {
        $uniqueid       = uniqid();

        $original_name  = $file->getClientOriginalName();
        $size           = $file->getSize();

        $extension      = $file->getClientOriginalExtension();
        $name           = Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;

        $file->storeAs('public/uploads/files/',$name);  

        $filepath      = '/storage/uploads/files/'.$name;

        return [
            'file' => $filepath,
            'file_size' => $size,
            'file_name' => $original_name
        ];
    }
}