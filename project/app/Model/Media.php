<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    Protected $appends = ['img'];
    public function getImgAttribute(){
        try {
            return '/storage/images/'. $this->attributes['title'];
        }catch(\Exception $e) {
            return null;
        }

    }
}
