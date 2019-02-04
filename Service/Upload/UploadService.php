<?php

namespace Service\Upload;

class UploadService implements UploadServiceInterface
{

    public function upload($fileInfo, $destination): string
    {
        $fileName = $destination
            . DIRECTORY_SEPARATOR . uniqid() . '_' . $fileInfo['name'];

        $result = move_uploaded_file($fileInfo['tmp_name'], $fileName);

        $fileName = dirname($_SERVER['PHP_SELF']) .
            DIRECTORY_SEPARATOR
            .
            $fileName;

        return $fileName;
    }
}