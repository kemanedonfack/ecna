<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icone extends Model
{
    protected $guarded = [];
    
    public function service()
    {
        return $this->hasMany('App\Services');
    }
}
