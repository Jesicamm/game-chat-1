<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function game()
    {
        return $this->belongsTo('App\Models\Game','game_id','id');
    }

    public function player()
    {
        return $this->belongsTo('App\Models\Player','owner_id','id');
    }

    public function membership()
    {
        return $this->hasMany('App\Models\Membership','party_id');   
    }

    public function message()
    {
        return $this->hasMany('App\Models\Message','party_id');
        
    }
}
