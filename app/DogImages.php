<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DogImages extends Model
{
    protected $fillable = ['dog_id','image'];
    protected $table = 'dog_images';
}
