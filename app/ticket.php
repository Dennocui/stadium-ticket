<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'customer_id','event_id ','units', 'amount',
    ];
    //
   

    public function event()
    {
        return $this->belongsTo('App\event', 'event_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'customer_id');
    }
}
