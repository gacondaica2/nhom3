<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Model\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $category = Categories::with([
                'product'  => function($query) {}
            ])->where('status', 1)
            ->where('parent_id', 0)
            ->get();
            if( count($category) <= 0 ) throw new \Exception('Chưa có danh mục');
            SEOMeta::setTitle('home');
            SEOMeta::setDescription('Trang chủ');
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.page.home')->with([
                'Categories' => $category
            ]);
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
    public function create()
    {
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

    public function email() {
        Mail::send('frontend.page.home', array('name'=>'nguyen linh','email'=>'dankhanhpro@gmail.com', 'content'=>'test email'), function($message){
	        $message->to('dankhanhpro@gmail.com', 'Visitor')->subject('Visitor Feedback!');
        });
        dd('Gửi mail thành công');
    }

    public function contact() {
        try {
            return view('frontend.page.contact');
        }catch(\Exception $e) {
            abort(404);
        }
    }
    public function about() {
        try {
            return view('frontend.page.about');
        }catch(\Exception $e) {
            abort(404);
        }
    }
}
