<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HipElbows extends Model
{
    protected $fillable = ['title','created_by'];
    protected $table = 'hips_elbows';

    public function hip_elbows()
    {
        return $this->belongsTo('App\Dogs','id','id');
    }
}
