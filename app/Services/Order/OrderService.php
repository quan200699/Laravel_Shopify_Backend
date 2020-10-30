<?php


namespace App\Services\Order;

use App\Services\Service;

interface OrderService extends Service
{
    public function findAllByUserAndStatus($user_id, $status);

    public function findAllProductsByUser($user_id);

    public function sumAllPriceInOrder($month, $year);
}
