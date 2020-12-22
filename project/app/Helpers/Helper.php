<?php 
use App\Model\Categories;
use App\Model\Product;
use App\Model\Media;

class Helper {
    public static function Category() {
        return Categories::with([
            'childrent' => function($query) {}
        ])->where('parent_id', 0)->get();
    }

    public static function BestSale() {
        return Product::orderBy('price', 'desc')->limit(10)->get();
    }

    public static function UploadImage($image) {
        if( isset($image) )
        {
            $name = time().'.'.$image->getClientOriginalExtension();
            return url('/upload/'. date("Y/m/d",strtotime(now())) .'/'. $image);
        }
    }

    public static function Option() {
        return [
            'Hãng sản xuất',
            'Kích thước',
            'Trọng lượng',
            'Bộ nhớ đệm / Ram',
            'Bộ nhớ trong',
            'Loại SIM',
            'Loại màn hình',
            'Kích thước màn hình',
            'Độ phân giải màn hình',
            'Hệ điều hành',
            'Pin'
        ];
    }

    public static function slide() {
        return Media::where('type','slide')->get();
    }
    
    public static function logo_header() {
        return '/storage/images/'.Media::where('type','header')->first()->title;
    }
    public static function logo_footer() {
        return '/storage/images/'.Media::where('type','footer')->first()->title;
    }
}
?>