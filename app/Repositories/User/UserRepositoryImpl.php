<?php


namespace App\Repositories\User;


use App\Repositories\Eloquent\EloquentRepository;
use App\User;
use Illuminate\Support\Facades\DB;

class UserRepositoryImpl extends EloquentRepository implements UserRepository
{
    public function getModel()
    {
        $model = User::class;
        return $model;
    }

    public function findByEmail($email)
    {
        $result = $this->model->where('email', $email)->first();
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

    public function findFacebookUser($facebook_id)
    {
        $result = DB::table('users')->where('facebook_id', $facebook_id)
            ->whereNotNull('facebook_id')->first();
        return $result;
    }
}
