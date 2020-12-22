<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Manufacturer;
use App\Model\Size;
use App\Model\Weight;
use App\Model\Ram;
use App\Model\Internalmemory;
use App\Model\SIM;
use App\Model\screen;
use App\Model\Screensize;
use App\Model\Screenresolution;
use App\Model\Pin;
use App\Model\Operatingsystem;
use Dotenv\Parser\Value;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $manufacturer       = Manufacturer::all();
            $size               = Size::all();
            $weight             = Weight::all();
            $ram                = Ram::all();
            $internalmemory     = Internalmemory::all();
            $sim                = Sim::all();
            $screen             = screen::all();
            $screensize         = Screensize::all();
            $screenresolution   = Screenresolution::all();
            $operatingsystem    = Operatingsystem::all();
            $pin = Pin::all();
            return view('backend.option.index')->with([
                'manufacturers'      => $manufacturer,
                'sizes'              => $size,
                'rams'               => $ram,
                'internalmemorys'    => $internalmemory,
                'weights'            => $weight,
                'sims'               => $sim,
                'screensizes'        => $screensize,
                'screenresolutions'  => $screenresolution,
                'screens'            => $screen,
                'operatingsystems'   => $operatingsystem,
                'pins'               => $pin
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
        try {
            $record = '';
            $item = '';
            DB::beginTransaction();
            switch ($request->option) {
                case 0: {
                    $record = Manufacturer::where('title', $request->title)->get();
                    $item = new Manufacturer();
                    break;
                }
                case 1: {
                    $record = Size::where('title', $request->title)->get();
                    $item = new Size();
                    break;
                }
                case 2: {
                    $record = Weight::where('title', $request->title)->get();
                    $item = new Weight();
                    break;
                }
                case 3: {
                    $record = Ram::where('title', $request->title)->get();
                    $item = new Ram();
                    break;
                }
                case 4: {
                    $record = Internalmemory::where('title', $request->title)->get();
                    $item = new Internalmemory();
                    break;
                }
                case 5: {
                    $record = SIM::where('title', $request->title)->get();
                    $item = new SIM();
                    break;
                }
                case 6: {
                    $record = screen::where('title', $request->title)->get();
                    $item = new screen();
                    break;
                }
                case 7: {
                    $record = Screensize::where('title', $request->title)->get();
                    $item = new Screensize();
                    break;
                }
                case 8: {
                    $record = Screenresolution::where('title', $request->title)->get();
                    $item = new Screenresolution();
                    break;
                }
                case 9: {
                    $record = Operatingsystem::where('title', $request->title)->get();
                    $item = new Operatingsystem();
                    break;
                }
                case 10: {
                    $record = Pin::where('title', $request->title)->get();
                    $item = new Pin();
                    break;
                }
                default: {
                    throw new \Exception('Option không tồn tại');
                    break;
                }
            }
            if( is_null($record) > 0) throw new \Exception('Option đã tồn tại!');
            $item->title = $request->title;
            $item->save();
            DB::commit();
            return redirect()->back();
        }catch(\Exception $e){
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
    public function edit($id, Request $request)
    {   
        $record = $this->checkOption($id, $request->option);
        return view('backend.option.edit')->with([
            'record' => $record->first(),
            'position'  => $request->option
        ]);
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
        try{
            $record = $this->checkOption($id, $request->position)->first();
            $record->title = $request->title;
            $record->save();
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
    public function destroy($id, Request $request)
    {
        $data = $this->checkOption($request->option, $id);
        $data->first()->delete();
        return redirect()->back();
    }

    public function create_form() {
        try {
            $option = Manufacturer::all();
            if( empty($option)) throw new \Exception('Không có option');
            return view('backend.option.create')->with([
                'options' => $option,
                'position' => 0
            ]);
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    }

    public function option($id) {
        try {
            $data = '';
            $position = '';
            switch ($id) {
                case 0: {
                    $data = Manufacturer::all();
                    $position = 0;
                    break;
                }
                case 1: {
                    $data = Size::all();
                    $position = 1;
                    break;
                }
                case 2: {
                    $data = Weight::all();
                    $position = 2;
                    break;
                }
                case 3: {
                    $data = Ram::all();
                    $position = 3;
                    break;
                }
                case 4: {
                    $data = Internalmemory::all();
                    $position = 4;
                    break;
                }
                case 5: {
                    $data = SIM::all();
                    $position = 5;
                    break;
                }
                case 6: {
                    $data = screen::all();
                    $position = 6;
                    break;
                }
                case 7: {
                    $data = Screensize::all();
                    $position = 7;
                    break;
                }
                case 8: {
                    $data = Screenresolution::all();
                    $position = 8;
                    break;
                }
                case 9: {
                    $data = Operatingsystem::all();
                    $position = 9;
                    break;
                }
                case 10: {
                    $data = Pin::all();
                    $position = 10;
                    break;
                }
                default: {
                    throw new \Exception('Option không tồn tại');
                    break;
                }
            }
            if( is_null($data)) throw new \Exception('Danh mục không tồn tại!');
            return response()->json([
                'messages' => 'success',
                'data'  => $data,
                'position'  => $position
            ]);
            return redirect()->route('option');
        }catch(\Exception $e) {
            return response()->json([
                'messages' => 'error',
                'data' => $e->getMessage()
            ]);
        }
    }

    protected function checkOption($id ,$position ) {
        try {
            $data = '';
            switch ($position) {
                case 0: {
                    $data = Manufacturer::where('id',$id);
                    break;
                }
                case 1: {
                    $data = Size::where('id',$id);
                    break;
                }
                case 2: {
                    $data = Weight::where('id',$id);
                    break;
                }
                case 3: {
                    $data = Ram::where('id',$id);
                    break;
                }
                case 4: {
                    $data = Internalmemory::where('id',$id);
                    break;
                }
                case 5: {
                    $data = SIM::where('id',$id);
                    break;
                }
                case 6: {
                    $data = screen::where('id',$id);
                    break;
                }
                case 7: {
                    $data = Screensize::where('id',$id);
                    break;
                }
                case 8: {
                    $data = Screenresolution::where('id',$id);
                    break;
                }
                case 9: {
                    $data = Operatingsystem::where('id',$id);
                    break;
                }
                case 10: {
                    $data = Pin::where('id',$id);
                    break;
                }
                default: {
                    throw new \Exception('Option không tồn tại');
                    break;
                }
            }
            if( is_null($data)) throw new \Exception('dữ liệu không tồn tại');
            return $data;
        }catch(\Exception $e) {
            return redirect()->back()->with([      
                "messages"  => $e->getMessage(), 
                'color'     => 'alert-danger'
            ]);
        }
    } 
}
