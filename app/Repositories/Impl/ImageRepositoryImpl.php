<?php


namespace App\Repositories\Impl;


use App\Image;

class ImageRepositoryImpl extends \App\Repositories\Eloquent\EloquentRepository implements \App\Repositories\ImageRepository
{

    public function getModel()
    {
        $model = Image::class;
        return $model;
    }

    public function findAllByProduct($productId)
    {
        $result = $this->model->where('product_id', $productId)->first();
        return $result;
    }
}
