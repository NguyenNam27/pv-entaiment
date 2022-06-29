<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;
    protected $table = 'photos';
    public $primaryKey ='id';

    protected $fillable = ['name','image','is_active','created_at','updated_at'];
}

