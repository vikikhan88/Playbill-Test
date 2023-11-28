<?php

namespace App\Services\IContacts;

interface ICommentsService{
    public function add($request, $user);
    public function get($request, $user);
    public function update($commentId, $request, $user);
    public function delete($commentId, $user);
}
