<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // public function gameInstance()
    // {
    //     return $this->belongsToMany(GameInstance::class);
    // }
   
    public function gameUser()
    {
        return $this->belongsToMany(GameUser::class);
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function games() 
    // {
    //     return $this->belongsToMany(Game::class);
    // }
}
