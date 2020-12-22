<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $records = Media::orderBy('id','desc')
            ->where('type','slide')
            ->paginate(8);
            return view('backend.slide.index')->with([
                'records' => $records
            ]);
        }catch(\Exception $e) {

        }
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
            $media = new Media();
            $request->media->storeAs('public/images', date("Y-m-d").date("h-i-sa").$request->media->getClientOriginalName());
            $media->title = date("Y-m-d").date("h-i-sa").$request->media->getClientOriginalName();
            $media->type =(isset($request->type)) ? $request->type : 'slide';
            $media->save();
            DB::commit();
            return redirect()->route('slide');
        }catch(\Exception $e) {
            abort(404);
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
            $record = Media::find($id);
            if( empty($record)) throw new \Exception('Hình ảnh không tồn tại!');
            return view('backend.slide.edit')->with([
                'record' => $record,
                'type'  => 'slide'
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
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $record = Media::find($id);
            if( empty($record)) throw new \Exception('hình không tồn tại');
            if(isset($request->media)) {
                Storage::delete('public/images/'.$record->title);
                $request->media->storeAs('public/images', date("Y-m-d").date("h-i-sa").$request->media->getClientOriginalName());
                $record->title = date("Y-m-d").date("h-i-sa").$request->media->getClientOriginalName();
            }
            $record->save();
            DB::commit();
            return redirect()->back();

        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
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
            $record = Media::where('id', $id)->where('type', 'slide')->first();
            if( empty($record)) throw new \Exception('Slide không tồn tại!');
            $record->delete();
            Db::commit();
            return redirect()->route('slide');
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function create_inteface() 
    {
        return view('backend.slide.create');
    }

    public function logo_header() {
        try {
            $record = Media::where('type','header')->first();
            return view('backend.slide.edit')->with([
                'record' => $record,
                'type'  => 'header'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function logo_footer() {
        try {
            $record = Media::where('type','footer')->first();
            return view('backend.slide.edit')->with([
                'record' => $record,
                'type'  => 'footer'
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }
}
