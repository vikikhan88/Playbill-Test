<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\IContacts\IUsersRepository;
use Config;
use Exception;

class UsersRepositoryImpl implements IUsersRepository{

    public function getUserById($Id){
        return User::where('id', $Id)->first();
    }

    public function getUserByEmail($email){
        return User::where('email', $email)->first();
    }
}
