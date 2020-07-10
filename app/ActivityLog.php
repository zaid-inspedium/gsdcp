<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    public function Modules()
    {
        return $this->belongsTo('App\Modules','module_id','id'); 
    }

    public function Created_by()
    {
        return $this->belongsTo('App\User','user_id','id'); 
    }
}
