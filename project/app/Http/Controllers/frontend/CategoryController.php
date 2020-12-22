<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Model\Categories;
use App\Model\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, Request $request)
    {
        try {
            $category = Categories::where('slug', $slug)->with([
                'childrent' => function($query) {}
            ])->first();
            if( empty($category)) throw new \Exception('Danh mục không tồn tại!');
            $records = Product::where('category_id', $category->id);
            if(isset($request->min_price)) {
                $records =  $records->where('price', '>' , $request->min_price);
            }
            if(isset($request->max_price)) {
                $records =  $records->where('price', '<' , $request->max_price);
            }
            if(isset($request->type) && isset($request->orderBy)) {
                $records = $records->orderBy($request->type, $request->orderBy);
            } 
            $records = $records->paginate(8);
            SEOMeta::setTitle($category->title);
            SEOMeta::setDescription('Trang chủ');
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.category.category')->with([
                'records' => $records, 
                'category' => $category
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function findItem(Request $request) {
        try {
            $records = Product::where('title','like',"%". $request->search."%")->paginate(8);
            SEOMeta::setTitle('Tìm kiếm '. $request->search);
            SEOMeta::setCanonical('https://storemobile.xyz');
            return view('frontend.category.category')->with([
                'records'   => $records,
                'search'    => $request->search
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
    public function create($slug, Request $request)
    {
        try {
            $category = Categories::where('slug', $slug)->first();
            if( empty($category)) throw new \Exception('Danh mục không tồn tại!');
            $records = Product::where('category_id', $category->id)->where('status', 1);
            $records = $records->orderBy(isset( $request->type) ? $request->type: 'id', isset( $request->orderBy) ? $request->orderBy : 'desc');
            $records = $records->paginate(8);
            if( count($records) <= 0) throw new \Exception('Không có sản phẩm');
            return response()->json(['message' => "success", 'records' => $records]);
        }catch(\Exception $e) {
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
