<?php


namespace App\Repositories\WarehouseBillDetail;

use App\Repositories\Repository;

interface WarehouseBillDetailRepository extends Repository
{
    public function findAllByWarehouseBill($warehouseBillId);

    public function sumAllProduct($productId);
}
