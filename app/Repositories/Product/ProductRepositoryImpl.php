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
        $result = Product::with('category')
            ->where('category_id', $categoryId)
            ->orderBy('createdDate', 'desc')
            ->get();
        return $result;
    }

    public function findAllBySaleOffGreaterThanZero()
    {
        $result = Product::with('category')
            ->where('saleOff', '>', 0)
            ->orderBy('createdDate', 'desc')
            ->get();
        return $result;
    }

    public function getAllProductByPriceCondition($min, $max)
    {
        $result = Product::with('category')->where('price', '>=', $min)
            ->where('price', '<=', $max)
            ->orderBy('createdDate', 'desc')
            ->get();
        return $result;
    }

    public function getAllProductByName($name)
    {
        $result = Product::with('category')
            ->where('name', 'like', '%' . $name . '%')
            ->orderBy('createdDate', 'desc')
            ->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Product::with('category')
            ->orderBy('createdDate', 'desc')
            ->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Product::with('category')
            ->where('id', $id)->first();
    }

    public function getAllProductLatest()
    {
        return Product::with('category')->orderBy('createdDate')->get();
    }
}
