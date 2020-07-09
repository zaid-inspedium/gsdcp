<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DogShow extends Model
{
    protected $fillable = ['dog_id','show_id','judge','class','result','seat','critique','date','place','created_by','status','amount','created_from'];
    protected $table = 'dog_shows';

    public function dog_show()
    {
        return $this->belongsTo('App\Dog','dog_id','id'); 
    }

    public function event()
    {
        return $this->belongsTo('App\Event','show_id','id'); 
    }
}
