<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['module_id','name'];

    public function module()
    {
        return $this->belongsTo('App\Modules','module_id','id'); 
        //module_id is fk and id is pk in permissions table
    }

}
