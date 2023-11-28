<?php

namespace App\Services;

use App\Repository\IContacts\IUsersRepository;
use App\Services\IContacts\IUsersService;
use Exception;
use Config;
use Illuminate\Support\Facades\File;

class UsersServiceImpl implements IUsersService
{
    private $__usersRepo;
    public function __construct(IUsersRepository $__usersRepo){
        $this->__usersRepo = $__usersRepo;
    }

    public function login($request){

    }

    public function create($request){

    }

    public function update($request, $userId){

    }

    public function delete($userId){

    }

    public function findUser($request){
        $email = $request->email;
        $userData = $this->__usersRepo->getUserByEmail( $email);
        dd($userData);
        return $userData;
    }
}
