<?php


namespace App\Services;


interface ImageService extends Service
{
    public function findAllByProduct($productId);
}
