<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LitterInspection extends Model
{
    protected $fillable = ['breeder_id','sire_id','dam_id','city_id','address','valid_till','created_by'];
    protected $table = 'litter_inspect';

    public function sire_dog()
    {
        return $this->belongsTo('App\Dog','sire_id','id'); 
    }

    public function dam_dog()
    {
        return $this->belongsTo('App\Dog','dam_id','id'); 
    }

    public function litter_city()
    {
        return $this->belongsTo('App\Cities','city_id','id'); 
    }

    public function breeder()
    {
        return $this->belongsTo('App\User','breeder_id','id'); 
    }
}
