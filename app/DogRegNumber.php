<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DogRegNumber extends Model
{
    protected $fillable = ['dog_id','regestration_no'];
    protected $table = 'dog_reg_numbers';
}
