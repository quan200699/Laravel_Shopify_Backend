<?php


namespace App\Services;


interface NotificationService extends Service
{
    public function findAllByStatusIsFalseAndUser($user_id);

    public function findAllByUserAndDateDesc($user_id);
}
