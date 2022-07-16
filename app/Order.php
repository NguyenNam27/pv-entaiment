<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $table="orders";

    protected $fillable = ['customer_id','date_order','total','order_status_id','payment_id','note'];
}
