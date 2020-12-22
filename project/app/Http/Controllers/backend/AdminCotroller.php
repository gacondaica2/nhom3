<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\User;
use Darryldecode\Cart\Validators\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dashboard.home');
    }

    public function login() {
        return view('backend.dashboard.login');
    }

    public function checkManage( Request $request)
    {
        try {
            if( !isset($request->email) || !isset($request->password))  throw new \Exception('Chưa nhập thông tin tài khoản hoặc mật khẩu');
            $information = $request->only('email', 'password');
            if( !Auth::attempt($information)) throw new \Exception('Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->route('manage');
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]); 
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return view('backend.dashboard.changePassword');
    }

    public function change(Request $request) {
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(),[
                'password' => 'required|min:6|max:30',
                'repassword'    => 'required|min:6|max:30|same:password'
            ]);
            if( $validator->fails()) throw new \Exception('Mật khẩu nhập không giống nhau!');
            $admin = User::where('id', Auth::user()->id)->where('permission', 'administrator')->first();
            if( is_null($admin)) throw new \Exception('Tài khoản không tồn tại');
            $admin->password = bcrypt($request->password);
            $admin->save();
            DB::commit();
            return redirect()->route('checkAdmin')->with([      
                "messages"  => 'Thay đổi mật khẩu thành công!', 
                'color'     => 'alert-success'
            ]);
        }catch(\Exception $e ) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
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
}
