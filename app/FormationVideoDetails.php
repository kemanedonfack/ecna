<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class FormationVideoDetails extends Model
{
    protected $guarded = [];

    public function VideoFormation()
    {
        return $this->belongsTo('App\FormationVideoDetails');
    }
}
