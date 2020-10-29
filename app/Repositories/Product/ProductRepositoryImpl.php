<?php


namespace App\Repositories\Product;


use App\Product;
use App\Repositories\Eloquent\EloquentRepository;

class ProductRepositoryImpl extends EloquentRepository implements ProductRepository
{

    public function getModel()
    {
        $model = Product::class;
        return $model;
    }

    public function findAllByCategory($categoryId)
    {
        $result = Product::with('category')->where('category_id', $categoryId)->get();
        return $result;
    }

    public function findAllBySaleOffGreaterThanZero()
    {
        $result = Product::with('category')->where('saleOff', '>', 0)->get();
        return $result;
    }

    public function getAllProductByPriceCondition($min, $max)
    {
        $result = Product::with('category')->where('price', '>=', $min)
            ->where('price', '<=', $max)
            ->get();
        return $result;
    }

    public function getAllProductByName($name)
    {
        $result = Product::with('category')->where('name', 'like', '%' . $name . '%')->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Product::with('category')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Product::with('category')->where('id', $id)->get();
    }
}
