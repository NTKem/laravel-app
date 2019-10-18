<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'line_height', 'font_size','font_spacing','font_family','color','highlight','ship_link','screen_settings','zoom','contrast','tool_tip','other'
    ];
}
