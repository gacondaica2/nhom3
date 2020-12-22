<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    Protected $appends = ['img'];
    public function media() {
        return $this->hasOne('App\Model\Media', 'id', 'avatar_id');
    }
}
