<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Validators\Validator;
use Illuminate\Support\Facades\Storage;
use App\Model\Product;
use App\Model\Categories;
use App\Model\Media;

use App\Model\Option;
use App\Model\Option_detail;
use App\Model\Product_option;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $records = Product::orderBy('id','desc')
            ->paginate(8);
            return view('backend.product.product')->with([
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            DB::beginTransaction();
            $media_id = [];
            foreach($request->media as $item) {
                $item->storeAs('public\images', date("Y-m-d").date("h-i-sa").$item->getClientOriginalName());
                $media = new Media();
                $media->title = date("Y-m-d").date("h-i-sa").$item->getClientOriginalName();
                $media->save();
                $media_id[] = $media->id;
            }
            $check_data = Product::where('title', $request->title)->orwhere('sku', $request->sku)->first();
            if( !is_null($check_data)) throw new \Exception('Sản phẩm đã tồn tại!');
            $avatar = new Media();
            if( !$request->hasFile('media')) throw new \Exception('Chưa chọn hình ảnh hoặc hình ảnh không tồn tại!');
            $request->avatar->storeAs('public\images', date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName());
            $avatar->title = date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName();
            $avatar->save();
            $product                    = new Product();
            $product->title             = $request->title;
            $product->slug              = \Str::slug($product->title);
            $product->sku               = $request->sku;
            $product->price             = $request->price;
            $product->price_sale        = $request->price_sale;
            $product->content           = $request->editor;
            $product->qty               = $request->qty;
            $product->weight            = $request->weight;
            $product->width             = $request->width;
            $product->height            = $request->height;
            $product->category_id       = $request->childrent;
            $product->status            = $request->status;
            $product->avatar_id         = $avatar->id;
            $product->type              = $request->category;
            $product->media_id          = !is_null($request->media) ? $media_id :[];
            $product->description       = $request->description;
            $product->product_option_id = $this->Option_product($request);
            if( empty($product)) throw new \Exception('Thêm sản phẩm thất bại!');
            $product->save();
            DB::commit();
            return redirect()->route('productall');
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
    protected function Option_product($request) {
        try {
            $product_option = new Product_option();
            if( isset($request->manufacturer) && !is_null($request->manufacturer)) {
                $product_option->manufacturer = $request->manufacturer;
            }
            if( isset($request->size) && !is_null($request->feature)) {
                $product_option->size = $request->size;
            }
            if( isset($request->internalmemory) && !is_null($request->internalmemory)) {
                $product_option->internalmemory = $request->internalmemory;
            }
            if( isset($request->ram) && !is_null($request->ram)) {
                $product_option->ram = $request->ram;
            } 
            if( isset($request->weight_option) && !is_null($request->weight_option)) {
                $product_option->weight_option = $request->weight_option;
            }
            if( isset($request->sim) && !is_null($request->sim)) {
                $product_option->sim = $request->sim;
            }
            if( isset($request->type_sim) && !is_null($request->type_sim)) {
                $product_option->type_sim = $request->type_sim;
            }
            if( isset($request->screen) && !is_null($request->screen)) {
                $product_option->screen = $request->screen;
            }
            if( isset($request->screensize) && !is_null($request->screensize)) {
                $product_option->screensize = $request->screensize;
            }
            if( isset($request->screenresolution) && !is_null($request->screenresolution)) {
                $product_option->screenresolution = $request->screenresolution;
            }
            if( isset($request->operatingsystem) && !is_null($request->operatingsystem)) {
                $product_option->operatingsystem = $request->operatingsystem;
            }
            if( isset($request->pin) && !is_null($request->pin)) {
                $product_option->pin = $request->pin;
            }
            if( isset($request->feature) && !is_null($request->feature)) {
                $product_option->feature = $request->feature;
            }
            $product_option->save();
            return $product_option->id;
        }catch(\Exception $e) {
            return redirect()->back()->with([
                'messages'  => $e->getMessage(),
                'color'     => 'btn-dangle'
            ]);
        }
    }


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
        try {
            $item = Product::where('id', $id)->with([
                'media' => function($query) {},
                'category'  => function($query) {
                    $query->with([
                        'parent' => function($query) {},
                    ]);
                }
            ])->first();
            $sub_category       = Categories::where('parent_id',($item->category->parent_id == 0) ? $item->category->id : 1)->get();
            $parent             = Categories::where('parent_id', 0)->get();
            if( empty($item)) throw new \Exception('Sản phẩm không tồn tại!');
            return view('backend.product.detail')->with([
                'item'               => $item,
                'sub_category'       => $sub_category,
                'parent'             => $parent,
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) 
    {
        try{
            $product = Product::find($id);
            if( empty($product)) throw new \Exception('Sản phẩm không tồn tại');
            DB::beginTransaction();
            if( isset($request->media)) {
                $media_id = [];
                foreach($product->media_id as $image) {
                    $media = Media::find($image);
                    Storage::delete('public/images/'.$media->title);
                }
                $product->media_id  = ($request->media !== null) ? $media_id : [];
            }
            if( isset($request->avatar))  {
                $avatar = Media::find($product->avatar_id);
                Storage::delete('public/images/'.$avatar->title);
                $request->avatar->storeAs('public\images', date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName());
                $avatar->title = date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName();
                $avatar->save();
                $product->avatar_id     = $avatar->id;
            }
            if($request->media !== null) {
                foreach($request->media as $item) {
                    $item->storeAs('public\images', date("Y-m-d").date("h-i-sa").$item->getClientOriginalName());
                    $media = new Media();
                    $media->title = date("Y-m-d").date("h-i-sa").$item->getClientOriginalName();
                    $media->save();
                    $media_id[] = $media->id;
                }
            }
            $product->title         = $request->title;
            $product->slug          = \Str::slug($product->title);
            $product->sku           = $request->sku;
            $product->price         = $request->price;
            $product->price_sale    = $request->price_sale;
            $product->content       = $request->editor;
            $product->qty           = $request->qty;
            $product->weight        = $request->weight;
            $product->width         = $request->width;
            $product->height        = $request->height;
            $product->category_id   = $request->childrent;
            $product->option        = ProductController::Option($request);
            $product->description   = $request->description;
            $product->save();
            DB::commit();
            return redirect()->back()->with([      
                "messages" => 'Thay đổi thành công', 
                'color' => 'alert-success'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            if(empty($product)) throw new \Exception('Sản phẩm không tồn tại!');
            $avatar_id = Media::find($product->avatar_id);
            if(empty($avatar_id)) throw new \Exception('Hình ảnh không tồn tại!');
            Storage::delete('public/images/'.$avatar_id->title);
            $product->delete();
            foreach($product->media_id as $img) {
                $media = Media::find($img);
                $media->delete();
                Storage::delete('public/images/'.$media->title);
            }
            DB::commit();
            return redirect()->route('productall');
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function interfaceCreate() 
    {
        try{    
            $parent = Categories::where('parent_id',0)
            ->with(['childrent'])
            ->get();
            $record = Categories::where('parent_id', 0)
            ->with(['childrent'])
            ->first();
            $option = Option::with([
                'childrent'
            ])->get();
            return view('backend.product.create')->with([
                'parent'             => $parent,
                'record'             => $record,
                'option'            => $option
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }
    
    public function search( Request $request) {
        try{
            $records = Product::where('title', 'like', '%'.$request->name.'%')->paginate(10);
            return view('backend.product.product')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }
}
