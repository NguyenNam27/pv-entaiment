<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $table = "districts";
    protected $primaryKey = 'districtid';
    protected $fillable =['name'];

    public function province(){
        return $this->belongsTo('App\Province','provinceid');
    }
    public function ward(){
        return $this->hasMany('App\Ward');
    }
}
