<?php

namespace App\Repository\IContacts;

interface ICommentsRepository
{
    public function getCommentsById($CommentsData, $Comments, $CommentsDetails);
}
