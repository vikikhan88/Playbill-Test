<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\IContacts\IUsersRepository;
use Illuminate\Support\Facades\Hash;
use Config;
use Exception;

class UsersRepositoryImpl implements IUsersRepository{

    public function getUserById($Id){
        return User::where('id', $Id)->first();
    }

    public function getUserByEmail($email){
        return User::where('email', '=', $email)->first();
    }

    public function createUser($request){
        return  User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
    }
}
