<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listSlider = Slider::where('status','!=',0)->get();
        return view('backend.slider.index',compact('listSlider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sliders = Slider::where('status','2')->get();
        $html='';
        foreach($sliders as $item){
            $html.="<option value='".$item->id+1 ."'>Sau: $item->name</option>";
        }
        return view('backend.slider.create',compact('html'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->name = $request->input('name');
        $slug = $slider->name = Str::slug($slider->name, '-');
        $slider->link = $request->input('link');
        $slider->sort_order = $request->input('sort_order');
        $slider->position = $request->input('position');
        $slider->created_by = 1;
        $slider->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sliders = Slider::where('status','!=','0')->get();
        $slider = Slider::find($id);
        return view('backend.slider.edit',compact('sliders','slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $slider->name = $request->input('name');
        $slug = $slider->name = Str::slug($slider->name, '-');
        $slider->link = $request->input('link');
        $slider->sort_order = $request->input('sort_order');
        $slider->position = $request->input('position');
        $slider->created_by = 1;
        $slider->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/sliders'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * status change
     */
    public function status($id)
    {
        $slider = Slider::find($id);
        $slider->status = $slider->status == 2 ? 1 : 2;
        $slider->save();
        return response()->json(array('mes'=>$slider),200);
    }
    /**
     * view trash
     */
    public function trash()
    {
        $listSlider = Slider::where('status','=',0)->get();
        return view('backend.slider.trash',compact('listSlider'));
    }
    /**
     * validate name database
     */
    public function validateName()
    {
        $name = $_POST['data'];
        $slider = Slider::where('name',$name)->get();
        if(count($slider)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    /** 
     * restore from trash
    */
    public function restore()
    {
        $slider = Slider::find($_POST['data']);
        $slider->status = 1;
        $slider->save();
        return response()->json(array('mes'=>$slider->status),200);
    }
    /**
     * delete a to trash 
     * */  
    public function setTrash($id)
    {
        $slider =  Slider::find($id);
        $slider->status = 0;
        $slider->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }

    /**
     * delete a lot of to trash 
     * */  
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $slider = Slider::find($id);
            $slider->status = 0;
            $slider->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
     /**
     * remove a to database 
     * */  
    public function destroy()
    {
        $slider = Slider::find($_POST['data']);
        $slider->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
     /**
     * remove a lot of to database 
     * */  
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $slider = Slider::find($id);
            $slider->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}
