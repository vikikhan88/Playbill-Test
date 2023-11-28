<?php

namespace App\Repository;

use App\Models\Comments;
use App\Repository\IContacts\ICommentsRepository;
use Config;
use Exception;

class CommentsRepositoryImpl implements ICommentsRepository{

    public function getCommentsByUserId($userId)
    {
        return true;
    }

    public function addComment($comment, $userId, $replyTo){
        return  Comments::create([
            'comments' => $comment,
            'user_id' => $userId,
            'reply_to' => $replyTo
        ]);
    }
}
