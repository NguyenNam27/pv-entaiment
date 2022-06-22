<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    public $primaryKey ='id';
    protected $fillable=['name','image','slug','subcategories_id','price','short_description','content','is_active','created_at','updated_at'];

    public function subcategory(){
        return $this->belongsTo('App\Subcategory','subcategories_id');
    }
}
