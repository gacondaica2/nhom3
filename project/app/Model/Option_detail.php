<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option_detail extends Model
{
    protected $table = 'option_detail';

    public function option() {
        return $this->hasOne('App\Model\Option','id', 'option_id');
    }
}
