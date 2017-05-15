<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $fillable = ['order_id', 'product_id', 'size_id', 'color_id', 'qty', 'total'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function size(){
        return $this->belongsTo('App\Size', 'size_id');
    }

    public function color(){
        return $this->belongsTo('App\Color', 'color_id');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
