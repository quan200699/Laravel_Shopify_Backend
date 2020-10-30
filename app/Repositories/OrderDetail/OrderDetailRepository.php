<?php


namespace App\Repositories\OrderDetail;

use App\Repositories\Repository;

interface OrderDetailRepository extends Repository
{
    public function findAllOrderDetailByOrder($orderId);
}
