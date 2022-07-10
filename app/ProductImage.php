<?php   

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamps = false;
    public $primaryKey ='id';
    protected $fillable=['name','product_id','image','is_active','created_at','updated_at'];

    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
