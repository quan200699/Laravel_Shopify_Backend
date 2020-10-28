<?php


namespace App\Services;


interface OrderService extends Service
{
    public function findAllByUserAndStatus($user_id, $status);
}
