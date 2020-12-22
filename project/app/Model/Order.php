<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function order_delivery() {
        return $this->hasOne('App\Model\Order_delivery','order_id','id');
    }

    public function order_detail() {
        return $this->hasMany('App\Model\Order_detail','order_id','id');
    }
}
