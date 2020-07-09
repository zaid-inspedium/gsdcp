<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judges extends Model
{
    protected $fillable = ['full_name','description','image','signature','created_at','updated_at','status'];
    protected $table = 'judges';
}
