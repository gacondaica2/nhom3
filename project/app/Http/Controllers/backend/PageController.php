<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Validators\Validator;
use App\Model\Page; 
use App\Model\Media;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $records  = Page::orderBy('id','desc')->with([
                'media' => function($query) {}
            ])
            ->get();
            return view('backend.page.index')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('backend.page.create');
        }catch(\Exception $e) {
            abort(404);
        }
    }

    public function add(Request $request) {
        try {
            $validator = Validator::make($request->all(),[
                'avatar'        => 'required',
                'title'         => 'required',
                'content'       => 'required',
                'description'   => 'required'
            ]);
            if( $validator->fails()) throw new \Exception('Nhập đầy đủ thông tin!');
            DB::beginTransaction();
            if( !$request->hasFile('avatar')) throw new \Exception('Chưa chọn hình ảnh hoặc hình ảnh không tồn tại!');
            $avatar = new Media();
            $request->avatar->storeAs('public\images', date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName());
            $avatar->title = date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName();
            $avatar->save();
            $new_page = new Page();
            $new_page->user_id = Auth::user()->id;
            $new_page->content = $request->content;
            $new_page->title = $request->title;
            $new_page->description = $request->description;
            $new_page->avatar_id = $avatar->id;
            $new_page->save();
            DB::commit();
            return redirect()->route('page')->with([      
                "messages" => 'Thêm tin tức thành công!', 
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
        try {
            $record = Page::find($id);
            if( is_null($record)) throw new \Exception('Tin tức không tồn tại!');
            return view('backend.page.edit')->with([
                'record' => $record
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages" => $e->getMessage(), 
                'color' => 'alert-danger'
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
    public function update($id, Request $request )
    {
        try {
            $record = Page::find($id);
            if( is_null($record)) throw new \Exception('Tin tức không tồn tại!');
            $validator = Validator::make($request->all(),[
                'title'         => 'required',
                'content'       => 'required',
                'description'   => 'required'
            ]);
            if( $validator->fails()) throw new \Exception('Nhập đầy đủ thông tin!');
            DB::beginTransaction();
            if( $request->hasFile('avatar'))
            {
                $avatar = Media::find($record->avatar_id);
                if( is_null($avatar)) throw new \Exception('Hình ảnh không tồn tại!');
                Storage::delete('public/images/'.$avatar->title);
                $request->avatar->storeAs('public\images', date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName());
                $avatar->title = date("Y-m-d").date("h-i-sa").$request->avatar->getClientOriginalName();
                $avatar->save();
                $record->avatar_id      = $avatar->id;
            }
            $record->user_id        = Auth::user()->id;
            $record->content        = $request->content;
            $record->title          = $request->title;
            $record->description    = $request->description;
            $record->save();
            DB::commit();
            return redirect()->route('page')->with([      
                "messages" => 'Cập nhật thành công!', 
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
            $page = Page::find($id);
            if(is_null($page)) throw new \Exception('tin tức không tồn tại!');
            $media = Media::find($page->avatar_id);
            if(empty($media)) throw new \Exception('Hình ảnh không tồn tại!');
            Storage::delete('public/images/'.$media->title);
            $page->delete();
            DB::commit();
            return redirect()->back()->with([
                "messages" => 'Xoá tin tức thành công!', 
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
