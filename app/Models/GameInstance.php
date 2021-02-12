<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameInstance extends Pivot
{
    protected $table = 'game_instance';

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function gameUser()
    {
        return $this->belongsToMany(GameUser::class);
    }
}
