<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Log;

class UploadService{
    public static function uploadFile(UploadedFile $file, $basePath = '/', $disk = 'public')
    {
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $storagePath = $basePath . '/' . $filename[0] . '/' . (isset($filename[1]) ? $filename[1] : '0');
        $filename .= '.' . $file->getClientOriginalExtension();

        try {
            $path = $file->storeAs($storagePath, $filename, $disk);
        } catch (Exception $e) {
            report($e);

            throw new UploadHelperException("Failed to store file {$filename} at {$storagePath}.");
        }

        return $path;
    }

    public static function uploadImage(UploadedFile $file, $basePath = '/', $disk = 'public')
    {
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $storagePath = $basePath . '/' . $filename[0] . '/' . (isset($filename[1]) ? $filename[1] : '0');
        $filename .= '.' . $file->getClientOriginalExtension();

        if (Storage::disk($disk)->exists($storagePath . '/' . $filename)) {
            $repeat = 2;
            do {
                $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . ' ' . $repeat);
                $filename .= '.' . $file->getClientOriginalExtension();
                $repeat++;
            } while (Storage::disk($disk)->exists($storagePath . '/' . $filename));
        }

        try {
            $path = $file->storeAs($storagePath, $filename, $disk);
        } catch (Exception $e) {
            Log::error("erro",['file'=>'UploadService.uploadImage','message'=>$e->getMessage()]);
        }

        return $path;
    }
}
