<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'option';

    public function childrent(){
        return $this->hasMany('App\Model\Option_detail', 'option_id', 'id');
    }
}
