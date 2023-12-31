<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use Symfony\Component\HttpFoundation\Response;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return response()->json(['message' => 'Working.'], Response::HTTP_OK);
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'create']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [AuthController::class, 'currentUser']);
    Route::get('/user/search/', [UserController::class, 'getUser']);
    Route::post('/comments', [CommentsController::class, 'addComment']);
});
