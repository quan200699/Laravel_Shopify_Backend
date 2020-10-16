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
}
