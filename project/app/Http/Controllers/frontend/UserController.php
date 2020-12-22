<?php

namespace App\Http\Controllers\frontend;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Model\User;
use App\Model\Order;
use App\Model\Password_reset;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('đăng nhập | đăng ký');
        SEOMeta::setDescription('Tài khoản');
        SEOMeta::setCanonical('https://storemobile.xyz');
        return view('frontend.user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'email'         => 'required|email|max:255|unique:users',
                'password'      => 'required|min:6|max:30',
                'repassword'    => 'min:6|max:30|same:password'
            ]);                                                                                                                                                                                                                                                                                                                                 
            if($validator->fails()) throw new \Exception($validator->errors()->first());
            $user = new User();
            $user->name         = $request->firstname ." ". $request->lastname;
            $user->password     = bcrypt($request->password);
            $user->email        = $request->email;
            $user->permission   = 'user';
            $user->save();
            DB::commit();
            return redirect()->back()->with([
                "messages"  => 'Đăng ký thành công!',
                'color'     => 'alert-success'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ])->withInput($request->all())
            ->withErrors($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if( !isset($request->email) || !isset($request->password))  throw new \Exception('Chưa nhập thông tin tài khoản hoặc mật khẩu');
            $information = $request->only('email', 'password');
            if( !Auth::attempt($information)) throw new \Exception('Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->route('my_account');
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
            ])->withInput($request->all())
            ->withErrors($e->getMessage());;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            if( !Auth::check() ) throw new \Exception('Bạn chưa đăng nhập');
            $records = Order::where('user_id', Auth::user()->id)->get();
            SEOMeta::setTitle(Auth::user()->name);
            SEOMeta::setDescription(Auth::user()->name);
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.user.account')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
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
    public function update(Request $request, $id)
    {
        //
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

    //logout user 

    public function logout() {
        try {
            if( Auth::Check() ) {
                Auth::logout();
                return redirect()->route('home');
            }
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function changeInfo(Request $request) {
        try {
            if( !is_null($request->password)) {
                $validator = Validator::make($request->all(), [
                    'password'          => 'required|min:6|max:30',
                    'new_password'      => 'min:6|max:30|same:password'
                ]);  
                if( $validator->fails()) throw new \Exception($validator->errors()->first());
            }
            if( ! Auth::check()) throw new \Exception('chưa đăng nhập');
            $user = User::find(Auth::user()->id);
            if( empty($user)) throw new \Exception('User không tồn tại!');
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt( $request->password);
            $user->save();
            return redirect()->route('my_account');
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function detail_order($id) {
        try {
            $order = Order::where('id', $id)->with([
                'Order_delivery',
                'order_detail' 
            ])->first();
            if( empty($order)) throw new \Exception('Đơn hàng không tồn tại!');
            SEOMeta::setTitle('danh sách đơn hàng');
            SEOMeta::setDescription('Đơn hàng');
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.order.detail')->with([
                'record' => $order
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function forgot_password(Request $request) {
        try {
            DB::beginTransaction();
            $record = User::where('email', $request->email)->first();
            if( is_null($record)) throw new \Exception('Email Không tồn tại');
            $table = ['q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m'];
            $token = '';
            for($i = 0 ; $i < count($table); $i++){
                $token .= $table[rand(0, 24)];
            }
            $reset = Password_reset::where('email', $record->email)->first();
            if( is_null($reset) ) {
                $reset = new Password_reset();
            }
            $reset->token = $token;
            $reset->email = $record->email;
            $reset->save();
            Mail::send('frontend.mail.forgot', [
                'name'      =>  $record->name,
                'email'     =>  $record->email,
                'content'   => 'Thông tin lấy lại mật khẩu',
                'record'    => $record,
                'token'     => $reset->token,
            ],  function($message) use ( $record ) {
                $message->to( $record->email, 'Lấy lại mật khẩu')->subject('Store Mobile Thông báo');
            });
            DB::commit();
            return redirect()->back()->with([      
                "messages"  => 'thông tin thay đổi mật khẩu đã được gửi qua email!', 
                'color'     => 'alert-success'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function confirm_password($token, Request $request) {
        try {
            $confirm = Password_reset::where('email', $request->email)->where('token', $token)->first();
            if( is_null($confirm)) throw new \Exception('Quá hạn hoặc thông tin truyền vào không đúng');
            return view('frontend.user.confirmpass')->with([
                'record' => $confirm
            ]);
        }catch(\Exception $e ) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function confirm_password_post($email, Request $request) {
        try {
            DB::beginTransaction();
            $user = User::where('email', $email)->first();
            if( is_null($user) ) throw new \Exception('Tài khoản không tồn tại!');
            $password_reset = Password_reset::where('email', $email)->first();
            if( is_null($password_reset) ) throw new \Exception('Quá thời hạn hoặc thông tin truyền vào không đúng!');
            $password_reset->delete();
            if( $request->password !== $request->repassword) throw new \Exception('Mật khẩu truyền vào không giống nhau!');
            $user->password = bcrypt($request->password);
            $user->save(); 
            DB::commit();
            return redirect()->back()->with([      
                "messages"  => 'thay đổi mật khẩu thành công!', 
                'color'     => 'alert-success'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }
}
