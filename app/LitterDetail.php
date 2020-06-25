<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LitterDetail extends Model
{
    protected $table = 'litter_details';

    public function litter_master()
    {
        return $this->belongsTo('App\LitterRegistration','litter_id','id'); 
    }
}
