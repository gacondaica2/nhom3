<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_option extends Model
{
    protected $table = 'product_option';

    public function manufacturer() {
        return $this->hasOne('App\Model\Option_detail','id', 'manufacturer');
    }

    public function size() {
        return $this->hasOne('App\Model\Option_detail','id', 'size');
    }
    public function internalmemory() {
        return $this->hasOne('App\Model\Option_detail','id', 'internalmemory');
    }
    public function ram() {
        return $this->hasOne('App\Model\Option_detail','id', 'ram');
    }
    public function weight_option() {
        return $this->hasOne('App\Model\Option_detail','id', 'weight_option');
    }
    public function sim() {
        return $this->hasOne('App\Model\Option_detail','id', 'sim');
    }
    public function type_sim() {
        return $this->hasOne('App\Model\Option_detail','id', 'type_sim');
    }
    public function screen() {
        return $this->hasOne('App\Model\Option_detail','id', 'screen');
    }
    public function screensize() {
        return $this->hasOne('App\Model\Option_detail','id', 'screensize');
    }
    public function screenresolution() {
        return $this->hasOne('App\Model\Option_detail','id', 'screenresolution');
    }
    public function operatingsystem() {
        return $this->hasOne('App\Model\Option_detail','id', 'operatingsystem');
    }
    public function pin() {
        return $this->hasOne('App\Model\Option_detail','id', 'pin');
    }
    public function feature() {
        return $this->hasOne('App\Model\Option_detail','id', 'feature');
    }
}
