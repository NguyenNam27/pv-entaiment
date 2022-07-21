<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table ="customers";
    public $fillable = ['name','email','phone','address','note','payment_id','created_at','updated_at'];
}
