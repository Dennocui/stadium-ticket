<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'name', 'descrition', 'image', 'event_Date', 'event_duration', 'hall_id','price','open',
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    public function hall()
    {
        return $this->belongsTo('App\hall','hall_id');
    }
    public function ticket()
    {
        return $this->hasMany('App\ticket', 'ticket_id');
    }
}
