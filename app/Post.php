<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','slug','short_description','content','image','key_word','is_active','created_at','updated_at'];


}
