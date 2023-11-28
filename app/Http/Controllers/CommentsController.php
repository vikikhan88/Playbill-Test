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
use App\Http\Requests\CommentRequest;

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

    public function addComment(CommentRequest $request){
        try {

            $user = Auth::user();

            $this->__commentsService->add($request, $user);

            return response()->json([
                'status' => true,
                'message' => 'Comment Added Successfully'
            ], Response::HTTP_OK);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
