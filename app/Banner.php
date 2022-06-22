<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $timestamps = false;
    protected $table="banners";

    protected $fillable = ['name','image','description','is_active','created_at','updated_at'];
}
