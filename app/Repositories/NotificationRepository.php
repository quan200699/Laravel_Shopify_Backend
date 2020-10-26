<?php


namespace App\Repositories;


interface NotificationRepository extends Repository
{
    public function findAllByStatusIsFalseAndUser($user_id);

    public function findAllByUserAndDateDesc($user_id);
}
