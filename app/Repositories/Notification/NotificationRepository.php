<?php


namespace App\Repositories\Notification;

use App\Repositories\Repository;

interface NotificationRepository extends Repository
{
    public function findAllByStatusIsFalseAndUser($user_id);

    public function findAllByUserAndDateDesc($user_id);
}
