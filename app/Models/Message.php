<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'date',
        'edited',
        'deleted',
        'player_id',
        'party_id',
    ];

    // Pertenencia a player
    public function player() {
        return $this->belongsTo('App\Models\Player','player_id','id');
    }

    // Pertenencia a party
    public function party() {
        return $this->belongsTo('App\Models\Party','party_id','id');
    }
}
