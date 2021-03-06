<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_id', 'size_id', 'color_id', 'stock'];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public static function createOrUpdate($product_id, $size_id, $color_id, $qty){
        $model = Stock::where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->where('color_id', '=', $color_id)->first();
        if ($model) {
            $model->stock = $model->stock + $qty;
            $model->save();
        } else {
          $model = Stock::create(['product_id' => $product_id, 'size_id' => $size_id, 'color_id' => $color_id, 'stock' => $qty]);
        }
        return $model;
    }

    public static function getSizeArray($product_id){
        return Stock::where('product_id', '=', $product_id)->pluck('size_id')->toArray();
    }

    public static function getColorArray($product_id){
        return Stock::where('product_id', '=', $product_id)->pluck('color_id')->toArray();
    }

    public static function getStockArray($product_id){
        return Stock::where('product_id', '=', $product_id)->pluck('stock')->toArray();
    }
}
