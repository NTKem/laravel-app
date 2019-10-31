<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload_Font extends Model
{
    protected $table = 'upload_fonts';
    protected $fillable = [
        'name', 'url','font_face','script'
    ];
}
