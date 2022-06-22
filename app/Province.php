<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;
    protected $table = "provinces";
    protected $primaryKey = 'provinceid';
    protected $fillable =['name'];

    public function districts(){
        return $this->hasMany('App\District','provinceid');
    }

}
