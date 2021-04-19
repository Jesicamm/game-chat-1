<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Party;

class PartyController extends Controller
{
    //Create a new party by game_id
    
    public function createParty(Request $request){

        $name = $request->input('name');
        $game_id = $request->input('game_id');
        $owner_id = $request->input('owner_id');

        try {

            return Party::create([
                'name' => $name,
                'game_id' => $game_id,
                'owner_id' => $owner_id
            ]);

        } catch (QueryException $error) {
            return $error;
        }
    }

}
