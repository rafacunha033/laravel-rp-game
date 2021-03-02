<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'country_resource';

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    public function resources() 
    {
        return $this->belongsTo(Resource::class);
    }
}
