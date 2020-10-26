<?php


namespace App\Repositories\Impl;


use App\Image;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ImageRepository;

class ImageRepositoryImpl extends EloquentRepository implements ImageRepository
{

    public function getModel()
    {
        $model = Image::class;
        return $model;
    }

    public function findAllByProduct($productId)
    {
        $result = $this->model->where('product_id', $productId)->get();
        return $result;
    }
}
