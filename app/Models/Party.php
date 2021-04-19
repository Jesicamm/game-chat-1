<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'game_id', 'owner_id'];

    public function game()
    {
        return $this->belongsTo('App\Models\Game','game_id','id');
    }

    public function player()
    {
        return $this->belongsTo('App\Models\Player','owner_id','id');
    }

    public function memberships()
    {
        return $this->hasMany('App\Models\Membership','party_id');   
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message','party_id');
        
    }
}
