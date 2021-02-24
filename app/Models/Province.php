<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
    
    public function resources()
    {
        return $this->belongsToMany(Resource::class)->withPivot('amount');
    }
}
