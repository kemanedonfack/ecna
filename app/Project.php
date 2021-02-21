<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    public function categorie()
    {
        return $this->belongsTo('App\categorie_project');
    }
}
