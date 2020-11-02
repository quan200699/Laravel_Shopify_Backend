<?php


namespace App\Repositories\CustomerInfo;

use App\CustomerInfo;
use App\Repositories\Eloquent\EloquentRepository;

class CustomerInfoRepositoryImpl extends EloquentRepository implements CustomerInfoRepository
{

    public function getModel()
    {
        $this->model = CustomerInfo::class;
        return $this->model;
    }

    public function getAllWithRelationship()
    {
        return CustomerInfo::with('user')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return CustomerInfo::with('user')->where('id', $id)->first();
    }
}
