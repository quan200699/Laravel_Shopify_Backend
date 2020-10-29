<?php


namespace App\Services\Notification;

use App\Services\Service;

interface NotificationService extends Service
{
    public function findAllByStatusIsFalseAndUser($user_id);

    public function findAllByUserAndDateDesc($user_id);
}
