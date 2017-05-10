<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'user_id', 'buyer_name', 'buyer_email', 'buyer_phone', 'buyer_address', 'buyer_message', 'amount', 'payment_response_info', 'security'];
}
