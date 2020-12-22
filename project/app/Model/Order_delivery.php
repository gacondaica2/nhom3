<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_delivery extends Model
{
    protected $table = 'order_delivery';
    
    public function Province() {
        return $this->hasOne('App\Model\Province','id','province_id');
    }

    public function District() {
        return $this->hasOne('App\Model\District','id','district_id');
    }

    public function Ward() {
        return $this->hasOne('App\Model\Ward','id','ward_id');
    }

    public function Order() {
        return $this->hasOne('App\Model\Order','id','order_id');
    }
    
}
