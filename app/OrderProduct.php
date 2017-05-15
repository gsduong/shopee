<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $fillable = ['order_id', 'product_id', 'size_id', 'color_id', 'qty', 'total'];

    public function product(){
        return $this->hasOne('App\Product', 'product_id');
    }

    public function size(){
        return $this->hasOne('App\Size', 'size_id');
    }

    public function color(){
        return $this->hasOne('App\Color', 'color_id');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
