<?php


namespace App\Repositories\OrderDetail;

use App\Repositories\Repository;

interface OrderDetailRepository extends Repository
{
    public function findAllOrderDetailByOrder($orderId);

    public function sumAllProductAmountInOrderDetail($product_id);
}
