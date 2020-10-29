<?php


namespace App\Repositories\Order;

use App\Repositories\Repository;

interface OrderRepository extends Repository
{
    public function findAllByUserAndStatus($user_id, $status);
}
