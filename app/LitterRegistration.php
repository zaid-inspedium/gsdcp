<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LitterRegistration extends Model
{
    protected $table = 'litters';

    public function litter_owner()
    {
        return $this->belongsTo('App\User','owner_id','id'); 
    }

    public function litter_sire()
    {
        return $this->belongsTo('App\Dog','sire','id'); 
    }

    public function litter_dam()
    {
        return $this->belongsTo('App\Dog','dam','id'); 
    }

    public function litter_studcertificate()
    {
        return $this->belongsTo('App\StudCertificate','stud_id','id'); 
    }

    public function litter_created_by()
    {
        return $this->belongsTo('App\User','created_by','id'); 
    }

    public function litter_detail()
    {
        return $this->hasMany('App\LitterDetail','litter_id','id'); 
    }
}
