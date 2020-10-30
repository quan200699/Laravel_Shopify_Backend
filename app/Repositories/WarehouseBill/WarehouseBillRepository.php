<?php


namespace App\Repositories\WarehouseBill;

use App\Repositories\Repository;

interface WarehouseBillRepository extends Repository
{
    public function sumTotalPriceHaveBought($month, $year);
}
