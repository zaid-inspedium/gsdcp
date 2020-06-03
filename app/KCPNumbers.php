<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KCPNumbers extends Model
{
    protected $fillable = ['start_range','end_range','last_issued_no','status','created_by'];
    protected $table = 'kcp_numbers';
}
