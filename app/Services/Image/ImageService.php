<?php


namespace App\Services\Image;

use App\Services\Service;

interface ImageService extends Service
{
    public function findAllByProduct($productId);
}
