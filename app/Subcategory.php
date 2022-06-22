<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','is_active','created_at','updated_at'];

    public function product(){
        return $this->hasMany('App\Product');
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
}
