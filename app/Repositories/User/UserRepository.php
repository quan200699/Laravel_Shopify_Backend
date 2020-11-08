<?php


namespace App\Repositories\User;

use App\Repositories\Repository;


interface UserRepository extends Repository
{
    public function findByEmail($email);

    public function findFacebookUser($facebook_id);

    public function findGoogleUser($google_id);
}
