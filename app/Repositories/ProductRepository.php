<?php


namespace App\Repositories;


interface ProductRepository extends Repository
{
    public function findAllByCategory($categoryId);

    public function findAllBySaleOffGreaterThanZero();

    public function getAllProductByPriceCondition($min, $max);

    public function getAllProductByName($name);
}
