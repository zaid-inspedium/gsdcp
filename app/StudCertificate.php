<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudCertificate extends Model
{
    protected $table = 'stud_certificate';

    public function sire_dog()
    {
        return $this->belongsTo('App\Dog','sire','id'); 
    }

    public function dam_dog()
    {
        return $this->belongsTo('App\Dog','dam','id'); 
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by','id'); 
    }
}
