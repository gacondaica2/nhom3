<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public function product() {
        return $this->hasMany('App\Model\Product','category_id', 'id');
    }

    public function childrent() {
        return $this->hasMany('App\Model\Categories', 'parent_id','id');
    }

    public function parent() {
        return $this->hasOne('App\Model\Categories','id', 'parent_id');
    }
}
