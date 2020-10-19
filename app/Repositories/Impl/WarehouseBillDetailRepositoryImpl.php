<?php


namespace App\Repositories\Impl;


use App\Image;

class WarehouseBillDetailRepositoryImpl extends \App\Repositories\Eloquent\EloquentRepository implements \App\Repositories\WarehouseBillDetailRepository
{

    public function getModel()
    {
        $model = Image::class;
        return $model;
    }
}
