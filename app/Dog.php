<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $table = 'dogs';

    public function dog_owners()
    {
        return $this->hasMany('App\DogOwner','dog_id','id'); 
    }
}
