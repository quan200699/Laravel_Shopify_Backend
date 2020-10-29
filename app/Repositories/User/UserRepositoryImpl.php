<?php


namespace App\Repositories\User;


use App\Repositories\Eloquent\EloquentRepository;
use App\User;

class UserRepositoryImpl extends EloquentRepository implements UserRepository
{
    public function getModel()
    {
        $model = User::class;
        return $model;
    }

    public function findByEmail($email)
    {
        $result = $this->model->where('email',$email)->first();
        return $result;
    }

    public function getAllWithRelationship()
    {
        // TODO: Implement getAllWithRelationship() method.
    }

    public function findByIdWithRelationship($id)
    {
        // TODO: Implement findByIdWithRelationship() method.
    }
}
