<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Services\IContacts\IUsersService;
use App\Services\IContacts\ICommentsService;

class CommentsController extends Controller
{
    private $__usersService;
    private $__commentsService;

    /**
     * Summary of __construct
     * @param \App\Services\IContacts\IUsersService $__usersService
     * @param \App\Services\IContacts\ICommentsService $__commentsService
     */

     public function __construct(
        IUsersService $__usersService,
        ICommentsService $__commentsService,
    ) {
        $this->__usersService   = $__usersService;
        $this->__commentsService = $__commentsService;

    }

}
