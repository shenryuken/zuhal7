<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'ewallet_id', 
        'amount',
        'type',
        'to_account',
        'reference',
        'details'  
    ];

    public function ewallet()
    {
    	return $this->belongsTo('App\Models\Ewallet');
    }
}
