<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'maps');
    }
    
    public function games()
    {
        return $this->belongsTo(Game::class);
    }
}
