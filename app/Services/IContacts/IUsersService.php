<?php

namespace App\Services\IContacts;

interface IUsersService{
    public function login($request);
    public function create($request);
    public function update($request, $userId);
    public function delete($userId);
    public function findUser($request);
}
