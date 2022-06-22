<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $timestamps = false;
    protected $table="videos";

    protected $fillable = ['title','slug','image','URL','is_active','created_at','updated_at'];
}
