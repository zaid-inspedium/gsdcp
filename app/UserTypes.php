<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    protected $fillable = ['user_type'];
    protected $table = 'user_types';
}
