<?php


namespace App\Services\OrderDetail;

use App\Services\Service;

interface OrderDetailService extends Service
{
    public function findAllOrderDetailByOrder($orderId);
}
