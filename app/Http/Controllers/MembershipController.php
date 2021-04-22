<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MembershipController extends Controller
{
    public function getPartiesByPlayer(Request $request, $id)
    {
        $user = $request->user();
        if ($user['id'] != $id) {
            return response()->json([
                'error' => "Sólo puedes ver tus propios datos."
            ]);
        }
        try {
            $bymembership = Membership::where('player_id',$id)
                ->join('parties', 'parties.id', 'memberships.party_id')
                ->join('games', 'games.id', 'parties.game_id')->get();
            $byownership = $user->parties()->join('games', 'games.id', 'parties.game_id')->get();
            return [...$bymembership,...$byownership];
        } catch(QueryException $error) {
             return $error;
        }
    }
    public function getPlayersInParty(Request $request, $id)
    {
        try {
            $bymembership = Membership::where('party_id',$id)
                ->join('players', 'players.id', '=', 'memberships.player_id')
                ->select(['username'])->get();
            $byownership = Party::find($id)->player()->select(['username'])->get();
            return [...$bymembership,...$byownership];
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function newMembership(Request $request, $player_id, $party_id)
    {
        $user = $request->user();
        if ($user['id'] != $player_id) {
            return response()->json([
                'error' => "No autorizado."
            ]);
        }
        try {
            return response()->json(
                Membership::create([
                    "player_id" => $player_id,
                    "party_id" => $party_id,
                ])
            );
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function newMembershipSym(Request $request, $party_id, $player_id)
    {
        return $this->newMembership($request, $player_id, $party_id);
    }
    
    public function delete(Request $request, $player_id, $party_id)
    {
        $user = $request->user();
        if ($user['id'] != $player_id) {
            return response()->json([
                'error' => "No autorizado."
            ]);
        }
        try {
            return Membership::where('player_id',$player_id)
                ->where('party_id',$party_id)
                ->delete();
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function deleteSym(Request $request, $party_id, $player_id)
    {
        return $this->delete($request, $player_id, $party_id);
    }
}
