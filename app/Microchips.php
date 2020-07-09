<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microchips extends Model
{
    protected $fillable = ['assigned_to','valid_date','LOT','duree_valid','print_date_time','microchip','status','issued_date','assigned_by'];
    protected $table = 'microchips';
}
