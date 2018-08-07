<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
