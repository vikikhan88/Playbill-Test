<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Services\IContacts\IUsersService;
use App\Services\IContacts\ICommentsService;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\LoginRequest;
class AuthController extends Controller
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

    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function create(UserCreateRequest $request)
    {
        try {
            $user = $this->__usersService->create($request);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], Response::HTTP_OK);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function login(LoginRequest $request)
    {
        try {

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], Response::HTTP_UNAUTHORIZED);
            }

            $user = $this->__usersService->findUser($request);

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], Response::HTTP_OK);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function currentUser(){
        $user = Auth::user();
        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'user' => $user,
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], Response::HTTP_OK);
    }
}
