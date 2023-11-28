<?php

namespace App\Services;

use App\Repository\IContacts\ICommentsRepository;
use App\Services\IContacts\ICommentsService;
use Exception;
use Config;
use Illuminate\Support\Facades\File;

class CommentsServiceImpl implements ICommentsService
{
    private $commentsRepo;
    public function __construct(ICommentsRepository $commentsRepo){
        $this->commentsRepo = $commentsRepo;
    }

    public function add($request, $user){}
    public function get($request, $user){}
    public function update($commentId, $request, $user){}
    public function delete($commentId, $user){}
}
