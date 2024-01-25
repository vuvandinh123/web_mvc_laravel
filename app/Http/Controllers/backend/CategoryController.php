<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategory = Category::where('status','!=','0') ->orderBy('created_at', 'desc')->get();
        return view('backend.category.index',compact('listCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::where('status','!=','0')->get();
        $html1= $html2='';
        foreach($categorys as $item){
            $html1.='<option value="'.$item->id.'">'.$item->name.'</option>';
            $html2.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.category.create',compact('html1','html2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name, '-');
        $category->sort_order = $request->input('sort_order');
        $category->parent_id = $request->input('parent_id');
        $category->metakey = $request->input('metakey');
        $category->metadesc = $request->input('metades');
        $category->created_by = 1;
        $category->updated_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filename = $category->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categorys'), $filename);
            $category->image = $filename;
        } else if (!empty($imageurl)) {
            $category->image = $request->input('urlimage');
        } else {
            $category->image = 'category.png';
        }
        
        if($category->save()){
            $link = new Link();
            $link->slug = $category->slug;
            $link->table_id = $category->id;
            $link->type = 'category';
            $link->save();
            return redirect()->route('category.index')->with('success', 'Cập nhập hiệu thành công');
        }
        return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorys = Category::where('status','!=','0')->get();
        $category= Category::find($id);
        return view('backend.category.edit',compact('categorys','category'));
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name, '-');
        $category->sort_order = $request->input('sort_order');
        $category->parent_id = $request->input('parent_id');
        $category->metakey = $request->input('metakey');
        $category->metadesc = $request->input('metades');
        $category->created_by = 1;
        $category->updated_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filePath = public_path('images/categorys/' . $category->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = $category->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categorys'), $filename);
            $category->image = $filename;
        } else if (!empty($imageurl)) {
            $category->image = $request->input('urlimage');
        } 
        $category->save();
        if($category->save()){
            $link = Link::where('table_id',$id)->first();
            $link->slug = $category->slug;
            $link->save();
            return redirect()->route('category.index')->with('success', 'Cập nhập danh mục thành công');
        }
        return redirect()->route('category.index')->with('success', 'Cập nhập danh mục thất bại');
    }
    public function status($id)
    {
        $category = Category::find($id);
        $category->status = $category->status == 2 ? 1 : 2;
        $category->save();
        return response()->json(array('mes'=>$category),200);
    }
    public function trash()
    {
        $listCategory = Category::where('status','=',0)->get();
        return view('backend.category.trash',compact('listCategory'));
    }
    public function validateName()
    {
        $name = $_POST['data'];
        $category = Category::where('name',$name)->get();
        if(count($category)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    // khoi phuc trong thung rac
    public function restore()
    {
        $category = Category::find($_POST['data']);
        $category->status = 1;
        $category->save();
        return response()->json(array('mes'=>$category->status),200);
    }
    // xoa san pham vo thung rac
    public function setTrash($id)
    {
        $category =  Category::find($id);
        $category->status = 0;
        $category->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
    /**
     * Remove the specified resource from storage.
     */

    //  xoa tat ca cac san pham da chon
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $category = Category::find($id);
            $category->status = 0;
            $category->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
    public function destroy()
    {
        $category = Category::find($_POST['data']);
        $category->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $category = Category::find($id);
            $category->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}
