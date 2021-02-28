<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = 'province_resource';

    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }

    public function resource() 
    {
        return $this->belongsTo(Resource::class);
    }
    
}
