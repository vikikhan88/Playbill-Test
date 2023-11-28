<?php

namespace App\Repository\IContacts;

interface ICommentsRepository
{
    public function getCommentsByUserId($userId);

    public function addComment($comment, $userId, $replyTo);

}
