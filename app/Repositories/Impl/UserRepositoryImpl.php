<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\UserRepository;
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
}
