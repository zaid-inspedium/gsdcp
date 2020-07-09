<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LitterInspectionSecond extends Model
{
    protected $fillable = ['inspection_id','breeder_id','sire','dam','dam_condition','dam_eyes','dam_weight','dam_coat','dam_nails','dam_teats','puppies_condition','puppies_eyes','puppies_weight','puppies_coat','puppies_bones','puppies_nails','puppies_skincondition','puppies_bites','puppies_testicles','puppies_temperaments','puppies_uniformity_of_size','special_recommendation','special_features','inspection_status','remarks','created_by'];
    protected $table = 'litter_inspect_second';


    public function litter_inspection()
    {
        return $this->hasOne('App\LitterInspection','inspection_id','id'); 
    }

    public function breeder()
    {
        return $this->belongsTo('App\User','breeder_id','id'); 
    }

    public function sire_dog()
    {
        return $this->belongsTo('App\Dog','sire','id'); 
    }

    public function dam_dog()
    {
        return $this->belongsTo('App\Dog','dam','id'); 
    }

    public function groupBreedWarden()
    {
        return $this->belongsTo('App\User','created_by','id'); 
    }
}
