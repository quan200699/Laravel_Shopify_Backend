<?php


namespace App\Services\User;

use App\Services\Service;

interface UserService extends Service
{
    function findByEmail($name);

    public function getAllFacebookAccount($facebook_id);
}
