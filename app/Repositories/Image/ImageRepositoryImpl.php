<?php


namespace App\Repositories\Image;


use App\Image;
use App\Repositories\Eloquent\EloquentRepository;

class ImageRepositoryImpl extends EloquentRepository implements ImageRepository
{

    public function getModel()
    {
        $model = Image::class;
        return $model;
    }

    public function findAllByProduct($productId)
    {
        $result = Image::with('product')->where('product_id', $productId)->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Image::with('product')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Image::with('product')->where('id', $id)->first();
    }
}
