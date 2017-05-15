<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'user_id', 'buyer_name', 'buyer_email', 'buyer_phone', 'buyer_address', 'buyer_message', 'amount', 'payment_response_info', 'security', 'order_code'];

    public static function statusTranslate($status){
        switch ($status) {
            case -1:
                return "Cancelled";
            case 0:
                return "Pending";
            case 1:
                return "Shipping";
            case 2:
                return "Delivered";


            /* The following cases are used for nganluong api */
            case 4:
                return "Customer paid. Need to deliver now";
            case 3:
                return "Customer not paid. Contact right now";
            case 5:
                return "Customer paid. Shipping";
            case 6:
                return "Customer paid. Shipped";
            default:
                return "Unknown";
        }
    }

    public function order_product(){
        return $this->hasMany('App\OrderProduct');
    }
}
