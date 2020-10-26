<?php


namespace App\Repositories\Impl;


use App\Product;

class ProductRepositoryImpl extends \App\Repositories\Eloquent\EloquentRepository implements \App\Repositories\ProductRepository
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
}
