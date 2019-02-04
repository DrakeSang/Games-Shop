<?php

namespace Service\Upload;

interface UploadServiceInterface
{
    public function upload($fileInfo, $destination): string;
}