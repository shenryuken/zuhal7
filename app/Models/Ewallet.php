<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ewallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'current_balance', 
        'acc_no',  
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    } 

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
