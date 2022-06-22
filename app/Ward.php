<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = false;
    protected $table = "wards";
    protected $fillable =['wardid','name','districtid'];

    public function district(){
        return $this->belongsTo('App\District','districtid');
    }
    public function village(){
        return $this->hasMany('App\Village');
    }
}
