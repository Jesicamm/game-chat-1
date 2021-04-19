<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Message;
use App\Models\Party;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessagesInParty(Request $request, $id)
    {
        $user = $request->user();
        $membership = Membership::where('player_id',$user['id'])->where('party_id',$id);
        $party = Party::find($id);
        if (!$party) {
            return response()->json([
                'error' => "La party no existe."
            ]);
        }
        if (!$membership && $party['owner_id'] != $user['id']) {
            return response()->json([
                'error' => "Sólo puedes ver los mensajes de una party a la que perteneces."
            ]);
        }
        try {
            return $party->messages;
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function newMessageForParty(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|min:1',
            'date' => 'required',
        ]);
        $user = $request->user();
        $membership = Membership::where('player_id',$user['id'])->where('party_id',$id)->first();
        $party = Party::find($id);
        if (!$party) {
            return response()->json([
                'error' => "La party no existe."
            ]);
        }
        if (!$membership && $party['owner_id'] != $user['id']) {
            return response()->json([
                'error' => "Sólo puedes enviar mensajes a una party a la que perteneces."
            ]);
        }
        try {
            return Message::create([
                "player_id" => $user['id'],
                "party_id" => $id,
                "message" => $request->message,
                "date" => $request->date,
                "edited" => false,
                "deleted" => false
            ]);
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|min:1',
        ]);
        $user = $request->user();
        $message = Message::find($id);
        if (!$message) {
            return response()->json([
                'error' => "El mensaje no existe."
            ]);
        }
        if ($message['player_id'] != $user['id']) {
            return response()->json([
                'error' => "El mensaje no te pertenece."
            ]);
        }
        try {
            return $message->update([
                "message" => $request->message,
                "edited" => true
            ]);
        } catch(QueryException $error) {
             return $error;
        }
    }

    public function delete(Request $request, $id)
    {
        $user = $request->user();
        $message = Message::find($id);
        if (!$message) {
            return response()->json([
                'error' => "El mensaje no existe."
            ]);
        }
        if ($message['player_id'] != $user['id']) {
            return response()->json([
                'error' => "El mensaje no te pertenece."
            ]);
        }
        try {
            return $message->update([
                "message" => "Mensaje borrado",
                "deleted" => true
            ]);
        } catch(QueryException $error) {
             return $error;
        }
    }
}
