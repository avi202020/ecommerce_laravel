<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Log;

class UploadPublicService{
    public static function uploadFile(UploadedFile $file, $basePath = '/', $disk = 'uploads')
    {
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).time();
        $filename .= '.' . $file->getClientOriginalExtension();
        $storagePath = $disk . '/' .$basePath . '/' . $filename[0] . '/' . (isset($filename[1]) ? $filename[1] : '0');

        try {
            $path = $file->move($storagePath, $filename);
        } catch (Exception $e) {
            Log::error("erro",['file'=>'UploadPublicService.uploadFile','message'=>$e->getMessage()]);
        }
        return $path;
    }
}
