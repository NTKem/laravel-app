<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrast extends Model
{
    protected $fillable = [
        'color', 'background'
    ];
}
