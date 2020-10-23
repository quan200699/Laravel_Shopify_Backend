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
}
