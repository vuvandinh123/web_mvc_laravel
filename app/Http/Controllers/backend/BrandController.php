<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $listBrand = Brand::where('status','!=','0')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('backend.brand.index',compact('listBrand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status','=','2')->get();
        $html='';
        foreach($brands as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.brand.create',compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($brand->name, '-');
        $brand->sort_order = $request->input('sort_order');
        $brand->metakey = $request->input('metakey');
        $brand->metadesc = $request->input('metades');
        $brand->created_by = 1;
        $brand->updated_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filename = $brand->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brands'), $filename);
            $brand->image = $filename;
        } else if (!empty($imageurl)) {
            $brand->image = $request->input('urlimage');
        } else {
            $brand->image = 'brand.png';
        }
        if($brand->save()){
            $link = new Link();
            $link->slug = $brand->slug;
            $link->table_id = $brand->id;
            $link->type = 'brand';
            $link->save();
            return redirect()->route('brand.index')->with('success', 'Thêm Thương hiệu thành công');
        }
        return redirect()->route('brand.index')->with('success', 'Thêm Thương hiệu thất bại');
    }
    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.show',compact('brand'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        $brands = Brand::where('status','=','2')->get();
        $html = '';
        return view('backend.brand.edit',compact('brand','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $slug = $brand->slug = Str::slug($brand->name, '-');
        $brand->sort_order = $request->input('sort_order');
        $brand->metakey = $request->input('metakey');
        $brand->metadesc = $request->input('metades');
        $brand->created_by = 1;
        $brand->updated_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filePath = public_path('images/brands/' . $brand->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = $brand->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brands'), $filename);
            $brand->image = $filename;
        } else if (!empty($imageurl)) {
            $brand->image = $request->input('urlimage');
        }
        if($brand->save()){
            $link = Link::where('table_id',$id)->first();
            $link->slug = $slug;
            $link->save();
            return redirect()->route('brand.index')->with('success', 'Cập nhập hiệu thành công');
        }
        return redirect()->route('brand.index')->with('success', 'Cập nhập Thương hiệu thành công');
    }

    /**
     * status change
     */
    public function status($id)
    {
        $brand = Brand::find($id);
        $brand->status = $brand->status == 2 ? 1 : 2;
        $brand->save();
        return response()->json(array('mes'=>$brand),200);
    }
    /**
     * view trash
     */
    public function trash()
    {
        $listBrand = Brand::where('status','=',0)->get();
        return view('backend.brand.trash',compact('listBrand'));
    }
    /**
     * validate name database
     */
    public function validateName()
    {
        $name = $_POST['data'];
        $brand = Brand::where('name',$name)->get();
        if(count($brand)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    /** 
     * restore from trash
    */
    public function restore()
    {
        $brand = Brand::find($_POST['data']);
        $brand->status = 1;
        $brand->save();
        return response()->json(array('mes'=>$brand->status),200);
    }
    /**
     * delete a to trash 
     * */  
    public function setTrash($id)
    {
        $brand =  Brand::find($id);
        $brand->status = 0;
        $brand->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }

    /**
     * delete a lot of to trash 
     * */  
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $brand = Brand::find($id);
            $brand->status = 0;
            $brand->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
     /**
     * remove a to database 
     * */  
    public function destroy()
    {
        $brand = Brand::find($_POST['data']);
        $brand->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
     /**
     * remove a lot of to database 
     * */  
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $brand = Brand::find($id);
            $brand->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}
