<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DogOwner extends Model
{
    protected $fillable = ['dog_id','owner_id','type','date_from','date_to'];
    protected $table = 'dog_owners';

    public function dogs()
    {
        return $this->belongsTo('App\Dog','id'); 
    }

    public function owners()
    {
        return $this->belongsTo('App\User','owner_id','id'); 
    }
}
