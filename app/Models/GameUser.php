<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameUser extends Pivot
{
    protected $table = 'game_user';

    // public function gameInstance()
    // {
    //     return $table->belongsToMany(GameInstance::class);
    // }

    public function country()
    {
        return $this->belongsToMany(Country::class);
    }

}
