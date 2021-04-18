<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;

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
    Route::put('player/{id}', [PlayerController::class, 'update']);
    Route::get('player/{id}', [PlayerController::class, 'getById']);
});
