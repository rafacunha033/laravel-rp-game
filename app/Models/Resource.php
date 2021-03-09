<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function provinces()
    {
        return $this->belongsToMany(Province::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class)->withPivot('quantity');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
