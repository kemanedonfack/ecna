<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;


class Article extends Model
{
    use Commentable;
    protected $guarded = [];
}
