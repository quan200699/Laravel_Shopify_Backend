<?php


namespace App\Repositories\Impl;


use App\Notification;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\NotificationRepository;

class NotificationRepositoryImpl extends EloquentRepository implements NotificationRepository
{

    public function getModel()
    {
        $this->model = Notification::class;
        return $this->model;
    }

    public function findAllByStatusIsFalseAndUser($user_id)
    {
        $result = $this->model->where('user_id' , $user_id)
            ->where(function($q) {
                $q->where('status', 0);
            })
            ->get();;
        return $result;
    }
}
