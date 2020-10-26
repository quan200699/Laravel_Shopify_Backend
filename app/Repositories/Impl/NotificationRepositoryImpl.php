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
}
