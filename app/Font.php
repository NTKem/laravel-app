<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{

    protected $fillable = [
        'name', 'url','font_face'
    ];
}
