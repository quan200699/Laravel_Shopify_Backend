<?php


namespace App\Repositories\Image;

use App\Repositories\Repository;

interface ImageRepository extends Repository
{
    public function findAllByProduct($productId);
}
