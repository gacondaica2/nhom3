<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\wishlish;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function yeuthich() {
        try {
            if(!Auth::check()) throw new \Exception('Tài khoản chưa đăng nhập');
            $user_wishlist = wishlish::where('user_id', Auth::user()->id)->first();
            $product_arr = explode(',', $user_wishlist->product_id);
            $records = Product::get();
            foreach($product_arr  as $id_product) {
                $records = $records->where('id', $id_product);
            }
            dd($records);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
            ]);
        }
    }



    public function create($id) {
        try{
            if( !Auth::Check()) throw new \Exception('Đăng nhập để thêm sản phẩm vào danh yêu thích');
            $record = Product::where('id', $id)->first();
            if( is_null($record)) throw new \Exception('Sản phẩm không tồn tại!');
            $wishlish = wishlish::where('user_id', Auth::user()->id)->first();
            if( is_null($wishlish)) {
                $add_wish_list = new wishlish();
                $add_wish_list->user_id = Auth::user()->id;
                $add_wish_list->product_id = $record->id;
                $add_wish_list->save();
            }else {
                $flag = 0;
                $product_arr = explode(',', $wishlish->product_id);
                foreach( $product_arr as $value) {
                    if( $value == $record->id ) {
                        $flag = 1;
                    }
                }
                if( $flag == 1) throw new \Exception('Sản phẩm đã ở trong danh sách yêu thích!');
                $wishlish->product_id = $wishlish->product_id.','.$record->id;
                // $wishlish->save();
            }
            return redirect()->back()->with([
                "messages" => 'Thêm vào danh sách yêu thích thành công!', 
                'color' => 'alert-success'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
            ]);
        }
    }

    public function wishlist_view() {
        try {
            if( !Auth::check()) throw new \Exception('Đăng nhập để xem danh sách yêu thích!');
            $wishlish = wishlish::where('user_id', Auth::user()->id)->first();
            if( is_null($wishlish))  throw new \Exception('Chưa có sản phẩm yêu thích');
            $records = Product::with([
                'category' => function($query) {}
            ]);
            $products = explode(',',$wishlish->product_id);
            foreach($products as $product) {
                $records = $records->orwhere('id', $product);
            }
            $records = $records->get();
            if(is_null($records)) throw new \Exception('Không có sản phẩm yêu thích');
            return view('frontend.wishlist.index')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
            ]);
        }
    }

    public function destroy($id) {
        try {
            if( !Auth::check()) throw new \Exception('Đăng nhập để xem dánh sách yêu thích!');
            $product = Product::where('id', $id)->first();
            if( is_null($product)) throw new \Exception('Sản phẩm không tồn tại');
            $record = wishlish::where('user_id', Auth::user()->id)->first();
            $wishlist = explode(',', $record->product_id);
            foreach($wishlist as $key => $value ) {
                if( $value == $product->id) {
                    unset($wishlist[$key]);
                }
            }
            $record->product_id = implode(',',$wishlist);
            $record->save();
            return redirect()->back()->with([      
                "messages" => "Xoá sản phẩm khỏi danh sách thành công!" , 
                'color' => 'alert-success'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
            ]);
        }
    }
}
