<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = [
        'value'
    ];
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
