<?php 


namespace App\Services;


class UploadService {


    public static function ImageFile($file, $type = null) {
        $imageFile = '/category/' . $file->getClientOriginalName();
        $file->move(public_path('category'), $imageFile);

        return $imageFile;
    }
}