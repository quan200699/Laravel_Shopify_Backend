<?php


namespace App\Services\Product;

use App\Services\Service;

interface ProductService extends Service
{
    public function findAllByCategory($categoryId);

    public function findAllBySaleOffGreaterThanZero();

    public function getAllProductByPriceCondition($min, $max);

    public function getAllProductByName($name);
}
