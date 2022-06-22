<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $table="settings";
    protected $primaryKey='id';
    protected $fillable = ['company_name','address','image','hotline','email','introduce','is_active','created_at','updated_at'];
}
