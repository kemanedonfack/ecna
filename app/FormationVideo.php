<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormationVideo extends Model
{
    protected $guarded = [];

    public function videoDetails()
    {
        return $this->hasMany('App\FormationVideo');
    }
}
