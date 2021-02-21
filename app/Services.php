<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $guarded = [];

    public function icone()
    {
        return $this->belongsTo('App\Icone');
    }
}
