<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    public function player()
    {
        //????????????????¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿ PLAYER_ID O OWNER_ID?????????????????!
        return $this->belongsTo('App\Models\Player','player_id','id');
    }

    public function party()
    {
        return $this->belongsTo('App\Models\Party','party_id','id');
    }

}
