<?php


namespace App\Repositories\CustomerInfo;

use App\CustomerInfo;

class CustomerInfoRepositoryImpl implements CustomerInfoRepository
{
    public function getAll()
    {
        return CustomerInfo::with('user')->get();
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function update($data, $object)
    {
        // TODO: Implement update() method.
    }

    public function destroy($object)
    {
        // TODO: Implement destroy() method.
    }
}
