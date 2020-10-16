<?php


namespace App\Repositories\Impl;


use App\Product;

class ProductRepositoryImpl extends \App\Repositories\Eloquent\EloquentRepository implements \App\Repositories\ProductRepository
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $model = Product::class;
        return $model;
    }
}
