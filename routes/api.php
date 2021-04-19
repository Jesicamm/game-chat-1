<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GameController;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login', [PlayerController::class, 'login']);
Route::post('register', [PlayerController::class, 'register']);
// Route::post('register', function () {
//     return response()->json([
//         'Hello' => "Goodbye"
//     ]); 
// });
  
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', [PlayerController::class, 'logout']);
    Route::put('players/{id}', [PlayerController::class, 'update']);
    Route::get('players/{id}', [PlayerController::class, 'getById']);
    Route::get('players/{id}/parties', [MembershipController::class, 'getPartiesByPlayer']);
    Route::get('parties/{id}/players', [MembershipController::class, 'getPlayersInParty']);
    Route::put('players/{player_id}/parties/{party_id}', [MembershipController::class, 'newMembership']);
    Route::put('parties/{party_id}/players/{player_id}', [MembershipController::class, 'newMembershipSym']);
    Route::delete('players/{player_id}/parties/{party_id}', [MembershipController::class, 'delete']);
    Route::delete('parties/{party_id}/players/{player_id}', [MembershipController::class, 'deleteSym']);
    Route::post('/games/{id}/parties', [PartyController::class, 'createParty']);
    Route::get('/games/{id}/parties', [PartyController::class, 'findParty']);
    Route::delete('/parties/{id}', [PartyController::class, 'deleteParty']);
    Route::get('parties/{id}/messages', [MessageController::class, 'getMessagesInParty']);
    Route::post('parties/{id}/messages', [MessageController::class, 'newMessageForParty']);
    Route::put('messages/{id}', [MessageController::class, 'update']);
    Route::delete('messages/{id}', [MessageController::class, 'delete']);
});
