<?php


namespace App\Services;


interface ProductService extends Service
{
    public function findAllByCategory($categoryId);

    public function findAllBySaleOffGreaterThanZero();
}
