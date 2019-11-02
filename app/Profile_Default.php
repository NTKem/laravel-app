<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_Default extends Model
{
    protected $table = 'profile_default';
    protected $fillable = [
        'line_height', 'font_size','font_spacing','font_family','color','highlight','ship_link','screen_settings','zoom','contrast','tool_tip','other'
    ];
}
