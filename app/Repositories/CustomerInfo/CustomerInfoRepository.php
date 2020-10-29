<?php


namespace App\Repositories\CustomerInfo;

use App\Repositories\Repository;

interface CustomerInfoRepository extends Repository
{
    public function getAllWithRelationship();

    public function findByIdWithRelationship($id);
}
