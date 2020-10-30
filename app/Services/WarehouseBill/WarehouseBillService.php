<?php


namespace App\Services\WarehouseBill;

use App\Services\Service;

interface WarehouseBillService extends Service
{
    public function sumTotalPriceHaveBought($month, $year);
}
