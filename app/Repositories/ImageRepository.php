<?php


namespace App\Repositories;


interface ImageRepository extends Repository
{
    public function findAllByProduct($productId);
}
