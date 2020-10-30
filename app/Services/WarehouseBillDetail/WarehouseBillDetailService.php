<?php


namespace App\Services\WarehouseBillDetail;

use App\Services\Service;

interface WarehouseBillDetailService extends Service
{
    public function findAllByWarehouseBill($warehouseBillId);

    public function sumAllProduct($productId);
}
