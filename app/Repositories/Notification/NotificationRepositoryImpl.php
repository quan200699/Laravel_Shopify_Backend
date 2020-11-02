<?php


namespace App\Repositories\Notification;


use App\Notification;
use App\Repositories\Eloquent\EloquentRepository;

class NotificationRepositoryImpl extends EloquentRepository implements NotificationRepository
{

    public function getModel()
    {
        $this->model = Notification::class;
        return $this->model;
    }

    public function findAllByStatusIsFalseAndUser($user_id)
    {
        $result = Notification::with('user')->where('user_id', $user_id)
            ->where(function ($q) {
                $q->where('status', 0);
            })
            ->get();
        return $result;
    }

    public function findAllByUserAndDateDesc($user_id)
    {
        $result = Notification::with('user')->where('user_id', $user_id)
            ->orderBy('create_date', 'desc')
            ->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Notification::with('user')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Notification::with('user')->where('id', $id)->first();
    }
}
