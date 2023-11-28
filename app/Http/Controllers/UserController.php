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

class UserController extends Controller
{
    private $__usersService;

    /**
     * Summary of __construct
     * @param \App\Services\IContacts\IUsersService $__usersService
     */

    public function __construct(
        IUsersService $__usersService
    ) {
        $this->__usersService   = $__usersService;

    }

    public function getUser(Request $request,string  $email){
        dd($request->all(), $request->input('email'));
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [ 'email' => 'required|email' ]
            );

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], Response::HTTP_BAD_REQUEST);
            }

            $searchResults = $this->__usersService->findUser($request);

            return response()->json([
                'status' => true,
                'message' => 'User find Successfully',
                'user' => Auth::user(),
            ], Response::HTTP_OK);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
