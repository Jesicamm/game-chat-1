<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $player = Player::where('email', $request->email)->first();
        if (!$player) {
            return response()->json([
                'error' => "Email o password incorrecto"
            ]); 
        }
        if (Hash::check($request->password, $player->password)) {
            $token =  $player->createToken('Personal Access Token')->accessToken;
            return response()
                ->json([
                    'player' => $player,
                    'token' => $token,
                ], 200);
        } else {
            return response()->json([
                'error' => "Email o password incorrecto"
            ]); 
        }
    }

    public function register(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $request['password']=Hash::make($request['password']);
        $playerData = request(['email', 'username', 'password']);

        try {

            return Player::create($playerData);

        } catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];

            if($eCode == 1062) {
                return response()->json([
                    'error' => "Usuario ya registrado anteriormente"
                ]);
            }

        }
    }

    public function getById(Request $request, $id)
    {
        $user = $request->user();
        if ($user['id'] != $id) {
            return response()->json([
                'error' => "Sólo puedes ver tus propios datos."
            ]);
        }
        try {
            return Player::find($id);
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function update(Request $request, $id)
    {
        $user = $request->user();
        if ($user['id'] != $id) {
            return response()->json([
                'error' => "Sólo puedes modificar tus propios datos."
            ]);
        }
        try {
            $playerData = request(['email', 'username', 'steamUsername']);
            return Player::find($id)->update($playerData);
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout satisfactorio.'
        ]);
    }
}
