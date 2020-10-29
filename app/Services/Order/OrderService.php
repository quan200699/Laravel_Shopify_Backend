<?php


namespace App\Services\Order;

use App\Services\Service;

interface OrderService extends Service
{
    public function findAllByUserAndStatus($user_id, $status);
}
