<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Model\District;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Province;
use App\Model\Ward;
use App\Model\Order;
use App\Model\Order_detail;
use App\Model\Order_delivery;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try {           
            $records = Province::all();
            SEOMeta::setTitle('Giỏ hàng');
            SEOMeta::setDescription('Trang chủ');
            SEOMeta::setCanonical('https://storemobile.xyz');
           return view('frontend.cart.checkout')->with([
               'records' => $records
           ]);
       }catch(\Exception $e) {
           dd($e->getMessage());
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //     try {
    //         DB::beginTransaction();
    //         if( count( Cart::getContent()) === 0 ) throw new \Exception('Giỏ hàng không có sản phẩm');
    //         $validator = Validator::make($request->all(), [
    //             'email'         => 'required|email|max:255',
    //             'name'          => 'required',
    //             'phone'         => 'required',
    //             'address'       => 'required',
    //             'province'      => 'required',
    //             'district'      => 'required',
    //             'ward'          => 'required'
    //         ]);
    //         if( $validator->fails()) throw new \Exception('Nhập đầy đủ thông tin (*)!');
    //         $shipping_fee = 27000;
    //         $order              = new Order();
    //         $order->user_id     = ( Auth::check()) ? Auth::user()->name : ""; 
    //         $order->sub_total   = Cart::getSubtotal();
    //         $order->total       = Cart::getSubtotal() + $shipping_fee;
    //         $order->paymod      = 0;
    //         $order->status      = 0;
    //         $order->note        = $request->note;
    //         $order->save();
    //         if( empty($order)) throw new \Exception('Đơn hàng chưa được lưu!');
    //         foreach( Cart::getContent() as $item) {
    //             $product = Product::find($item->id);
    //             if( empty($product)) throw new \Exception('Sản phẩm không tồn tại!');
    //             if( $product->qty < $item->quantity ) throw new \Exception('Sản phẩm hiện không đủ hàng!');
    //             $product->qty -= $item->quantity;
    //             $product->save();
    //             $order_detail               = new Order_detail();
    //             $order_detail->name         = $item->name;
    //             $order_detail->price        = $item->price;   
    //             $order_detail->qty          = $item->quantity;
    //             $order_detail->order_id     = $order->id;
    //             $order_detail->save();
    //         }

    //         $order_delivery                 = new Order_delivery();
    //         $order_delivery->order_id       = $order->id;
    //         $order_delivery->name           = (Auth::check()) ? Auth::user()->name  : $request->name;
    //         $order_delivery->province_id    = $request->province;
    //         $order_delivery->district_id    = $request->district;
    //         $order_delivery->ward_id        = $request->ward;
    //         $order_delivery->address        = $request->address;
    //         $order_delivery->phone          = $request->phone;
    //         $order_delivery->email          = (Auth::check()) ? Auth::user()->email  : $request->email;
    //         $order_delivery->save();
    //         Cart::clear();     
    //         $my_order = Order::where('id', $order->id)->with([
    //             'order_delivery', 'order_detail'
    //         ])->first();
    //         Mail::send('frontend.mail.order', [
    //             'record'      =>  $my_order
    //         ],  function($message) use ( $order_delivery ){
    //             $message->to( $order_delivery->email, 'Đơn hàng của bạn')->subject('Đơn hàng của bạn!');
    //         });
    //         DB::commit();     
    //         return redirect()->route('detail_order', $my_order->id )->with([
    //             "messages"  => 'Cảm ơn bạn đã mua hàng tại StoreMobile.xyz!',
    //             'color'     => 'alert-success'
    //         ]);;
    //     }catch(\Exception $e) {
    //         return redirect()->back()->with([
    //             "messages" => $e->getMessage(),
    //             'color' => 'alert-danger'
    //         ])->withInput($request->all())
    //         ->withErrors($e->getMessage());
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function add($id, Request $request) {
    //     try {       
    //         $item = Product::find($id);
    //         if( empty($item)) throw new \Exception('Sản phẩm không tồn tại!');
    //         $item = [
    //             'id'            => $item->id,
    //             'name'          => $item->title,
    //             'price'         => ($item->price_sale > 0) ? $item->price_sale : $item->price,
    //             'quantity'      => (!empty($request->quantity))? $request->quantity : 1,
    //             'attributes'    => $item
    //         ];
    //         $record = Cart::add($item);
    //         return response()->json([
    //             'messages' => 'success',
    //             'item'      => ( count(Cart::getContent()) > 0) ? (Cart::getContent()) :0,
    //             'total'     => ( count(Cart::getContent()) > 0) ? (Cart::getTotal()) :0,
    //             'quantity' => Cart::getTotalQuantity()
    //         ]);
    //     }catch(\Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }
    
    // public function delete($id) {
    //     try {
    //         $item = Product::find($id);
    //         if( empty($item)) throw new \Exception('Sản phẩm không tồn tại!');
    //         $record = Cart::remove($id);
    //         return redirect()->back();
    //     }catch(\Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }
    public function apidelete($id) {
        try {
            $item = Product::find($id);
        //    print( $id);
            if( empty($item)) throw new \Exception('Sản phẩm không tồn tại!');
            $record = Cart::remove($id);
            return response()->json([
                'messages' => 'success',
                'item'      => ( count(Cart::getContent()) > 0) ? (Cart::getContent()) :0,
                'total'     => ( count(Cart::getContent()) > 0) ? (Cart::getTotal()) :0,
                'quantity' => Cart::getTotalQuantity()
            ]);
            
        }catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function detail() {  
        return view('frontend.cart.detail');
    }

    // public function plus($id) {
    //     try {
    //         Cart::update($id, [
    //             'quantity' => +1
    //         ]);
    //         return response()->json();
    //     }catch (\Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }

    public function mines($id) {
        try {
            Cart::update($id, [
                'quantity' => -1
            ]);
            return response()->json();
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function district($id) {
        try {
            $district = District::where('province_id', $id)->get();
            if( empty($district)) throw new \Exception('Không có Item');
            return response()->json([
                'messages'  => 'success',
                'data'      =>  $district
            ]);

        }catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function ward($id) {
        try {
            $district = Ward::where('district_id', $id)->get();
            if( empty($district)) throw new \Exception('Không có Item');
            return response()->json([
                'messages'  => 'success',
                'data'      =>  $district
            ]);

        }catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function apiCart() {
        try {
            return response()->json([
                'messages' => 'success',
                'item'      => ( count(Cart::getContent()) > 0) ? (Cart::getContent()) :0,
                'total'     => ( count(Cart::getContent()) > 0) ? (Cart::getTotal()) :0,
                'quantity' => Cart::getTotalQuantity()
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'messages' => 'fail',
                'item'  => null
            ]);
        }
    }
}
