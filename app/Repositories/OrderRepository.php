<?php


namespace App\Repositories;


interface OrderRepository extends Repository
{
    public function findAllByUserAndStatus($user_id, $status);
}
