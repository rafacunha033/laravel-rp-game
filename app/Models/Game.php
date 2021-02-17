<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    
}
