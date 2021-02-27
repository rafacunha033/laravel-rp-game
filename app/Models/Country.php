<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ]; 
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'maps');
    }
    
    public function games()
    {
        return $this->belongsTo(Game::class);
    }

    public function provinces()
    {
        return $this->belongsToMany(Province::class);
    }
}
