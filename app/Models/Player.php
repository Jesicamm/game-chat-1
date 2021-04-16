<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'steamUsername',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    //Relación uno a muchos de usuario hacia parties
    public function parties () {
        return $this->hasMany('App\Models\Party','owner_id');
    }

    //Relación uno a muchos de usuario hacia memberships
    public function memberships () {
        return $this->hasMany('App\Models\Membership','player_id');
    }

    //Relación uno a muchos de usuario hacia messages
    public function messages () {
        return $this->hasMany('App\Models\Message','player_id');
    }

}
