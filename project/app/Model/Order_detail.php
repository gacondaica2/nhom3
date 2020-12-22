<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';

    public function order() {
        return $this->hasOne('App\Model\Order','id','order_id');
    }
}
