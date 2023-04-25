<?php

use App\Events\NewMessage;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisibilityController;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Auth
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/register/verify', [RegisteredUserController::class, 'verify']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Street
Route::get('/street', [StreetController::class, 'index']);

// House
Route::get('/house', [HouseController::class, 'index']);
Route::get('/house/{house}', [HouseController::class, 'show']);
Route::post('/house/verify', [HouseController::class, 'verify']);

// Block
Route::get('/block', [BlockController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{user}', [UserController::class, 'show']);

    Route::resource('/post', PostController::class)->except(['update', 'destroy']);

    Route::get('/search', [SearchController::class, 'index']);

    Route::get('/category', [CategoryController::class, 'index']);

    Route::get('/visibility', [VisibilityController::class, 'index']);

    Route::resource('/like', LikeController::class)->except(['index', 'update']);

    Route::get('/chats', [ChatController::class, 'rooms']);
    Route::get('/chats/{room_id}', [ChatController::class, 'messages']);
    Route::post('/chats/{room_id}', [ChatController::class, 'message']);
});
