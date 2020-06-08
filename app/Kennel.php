<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kennel extends Model
{
    protected $fillable = ['owner_id','kennel_name','prefix','suffix','old_record','website','description'];

    public function owners()
    {
        return $this->belongsTo('App\User','owner_id','id'); 
    }
}