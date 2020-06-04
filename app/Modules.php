<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $fillable = ['name','module_title','status'];

    public function module()
    {
        return $this->hasMany('App\Permission','id'); 
    }
}
