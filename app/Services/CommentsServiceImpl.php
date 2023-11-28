<?php

namespace App\Services;

use App\Repository\IContacts\ICommentsRepository;
use App\Services\IContacts\ICommentsService;
use Exception;
use Config;
use Illuminate\Support\Facades\File;

class CommentsServiceImpl implements ICommentsService
{
    private $__commentsRepo;
    public function __construct(ICommentsRepository $__commentsRepo){
        $this->__commentsRepo = $__commentsRepo;
    }

    public function add($request, $user){
        $comment = $request->comment;
        $userId = $user->id;
        $replyTo = $request->replyTo ?? 0;

        return $this->__commentsRepo->addComment($comment, $userId, $replyTo);
    }
    public function get($request, $user){}
    public function update($commentId, $request, $user){}
    public function delete($commentId, $user){}
}
