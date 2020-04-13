<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'first_name', 
        'last_name', 
        'icno', 
        'gender', 
        'contact_mobile', 
        'contact_home', 
        'contact_office',
        'street', 
        'city', 
        'postcode', 
        'state', 
        'country',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    } 
}
