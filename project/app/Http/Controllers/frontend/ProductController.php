<?php

namespace App\Http\Controllers\frontend;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Http\Controllers\Controller;
use App\Model\Media;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, Request $request)
    {
        try {
            $record = Product::where('slug', $slug)->where('status', 1)
            ->with([
                'media' => function($query) {
                }
            ])
            ->first();
            if( empty($record)) throw new \Exception('Sản phẩm không tồn tại!');
            foreach($record->media_id as $value) {
                $media[] = Media::where('id', $value)->first()->img;
            }
            SEOMeta::setTitle($record->title);
            SEOMeta::setDescription('Trang chủ');
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.product.product')->with([
                'record'    => $record,
                'media'    => $media
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function findItem( Request $request) {
        try {
            $records = Product::where('title','like',"%". $request->search."%")->paginate(8);
            SEOMeta::setTitle('Tìm kiếm '. $request->search);
            SEOMeta::setDescription($request->desciption);
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.category.category')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            return view('frontend.category.category')->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
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
        //
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

    public function wishlist() {
        try {

        }catch(\Exception $e ) {
            
        }
    }
}
