<?php

namespace App\Model;
use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    Protected $appends = ['img'];
    protected $casts = [
        'media_id'  => 'array',
        'option'    => 'array'
    ];
    public function media(){
        return $this->hasOne('App\Model\Media', 'id', 'avatar_id');
    }

    public function category(){
        return $this->hasOne('App\Model\Categories', 'id', 'category_id');
    }

    public function getImgAttribute(){
        try {
            return '/storage/images/'. Media::where('id', $this->attributes['avatar_id'])->first()->title;
        }catch(\Exception $e) {
            return null;
        }

    }

    public function option(){
        return $this->hasOne('App\Model\Product_option', 'product_id', 'id');
    }
}
