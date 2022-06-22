<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $table = "contacts";
    protected $fillable = ['name_company','budget','full_name','email','phone','massage','booking_type'];
}
