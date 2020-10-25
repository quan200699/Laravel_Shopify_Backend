<?php


namespace App\Services;


interface UserService extends Service
{
    function findByEmail($name);
}
