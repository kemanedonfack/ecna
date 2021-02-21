<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie_project extends Model
{
    protected $guarded = [];
    
    public function Project()
    {
        return $this->hasMany('App\Project');
    }
}
