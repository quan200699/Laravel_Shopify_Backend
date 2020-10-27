<?php


namespace App\Repositories\Impl;


use App\Product;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ProductRepository;

class ProductRepositoryImpl extends EloquentRepository implements ProductRepository
{

    public function getModel()
    {
        $model = Product::class;
        return $model;
    }

    public function findAllByCategory($categoryId)
    {
        $result = $this->model->where('category_id', $categoryId)->get();
        return $result;
    }

    public function findAllBySaleOffGreaterThanZero()
    {
        $result = $this->model->where('saleOff', '>', 0)->get();
        return $result;
    }

    public function getAllProductByPriceCondition($min, $max)
    {
        $result = $this->model->where('price', '>=', $min)
            ->where('price', '<=', $max)
            ->get();;
        return $result;
    }
}
