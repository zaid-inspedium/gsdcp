<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public function dog_show()
    {
        return $this->hasMany('App\DogShow','dog_id','id'); 
    }
}
