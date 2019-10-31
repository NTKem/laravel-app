<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shopify_domain'
    ];

    /**
     * Get all of the users that belong to the store.
     */
    public function users()
    {
        return $this->belongsToMany(
            'App\User', 'store_users', 'store_id', 'user_id'
        );
    }
    public function layout()
    {
        return $this->hasOne('App\Layout');
    }
    public function font(){
        return $this->hasMany(Upload_Font::class);
    }

}