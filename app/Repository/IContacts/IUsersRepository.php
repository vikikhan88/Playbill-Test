<?php

namespace App\Repository\IContacts;

interface IUsersRepository
{
    public function getUserById($userId);

    public function getUserByEmail($email);

    public function createUser($request);
}
