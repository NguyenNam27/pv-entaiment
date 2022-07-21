<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $table="order_details";

    protected $fillable = ['name','image','sku','order_id','product_id','price','qty','created_at','updated_at'];
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
