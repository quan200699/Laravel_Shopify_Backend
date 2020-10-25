<?php


namespace App\Repositories\Impl;


use App\CustomerInfo;
use App\Repositories\CustomerInfoRepository;
use App\Repositories\Eloquent\EloquentRepository;

class CustomerInfoRepositoryImpl extends EloquentRepository implements CustomerInfoRepository
{

    public function getModel()
    {
        $this->model = CustomerInfo::class;
        return $this->model;
    }
}
