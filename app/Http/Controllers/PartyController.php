<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Party;

class PartyController extends Controller
{
    //Create a new party by game_id

    public function createParty(Request $request, $game_id){

        $name = $request->input('name');
        $user = $request->user();
        $owner_id = $user['id'];

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
    //Find a party by game_id
    public function findParty($game_id) {
        try {

            return Party::all()->where('game_id', '=', $game_id);
       
        } catch (QueryException $error){
            return $error;
        }
    } 
    
    public function deleteParty(Request $request, $party_id){
       
        $user = $request->user();
        $owner_id = $user['id'];
        $party = Party::find($party_id);

        if (!$party){
            return response() -> json([
                'error' => "La party no existe."
            ]);
        
        }

        if ($party['owner_id'] != $owner_id){
            return response() -> json([
                'error' => "La party no te pertenece."
            ]);

        }
        try {
            return $party
            ->delete();
        } catch(QueryException $error){
            return $error;
        }
        
    }

}
