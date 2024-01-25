<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listProduct =
            Product::where('2121110393_product.status','!=',0)
            ->join('2121110393_category', '2121110393_product.category_id', '=', '2121110393_category.id')
            ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
            ->orderBy('created_at', 'desc')
            ->select('2121110393_product.*', '2121110393_category.name as category_name', '2121110393_brand.name as brand_name')
            ->get();
        return view('backend.product.index',compact('listProduct'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::select('id', 'name')->get();
        $categorys = Category::select('id', 'name')->get();
        return view('backend.product.create', compact('brands', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = Str::slug($product->name, '-');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('pricesale');
        $product->qty = $request->input('qty');
        $product->detail = $request->input('detail');
        $product->metakey = $request->input('metakey');
        $product->metadesc = $request->input('metades');
        $product->created_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filename = $product->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $filename);
            $product->image = $filename;
        } else if (!empty($imageurl)) {
            $product->image = $request->input('urlimage');
        } else {
            $product->image = 'product.png';
        }


        $product->save();
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::join('2121110393_category', '2121110393_product.category_id', '=', '2121110393_category.id')
            ->join('2121110393_brand', '2121110393_product.brand_id', '=', '2121110393_brand.id')
            ->select('2121110393_product.*', '2121110393_category.name as category_name', '2121110393_brand.name as brand_name')
            ->find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function status($id)
    {
        $product = Product::find($id);
        $product->status = $product->status == 2 ? 1 : 2;
        $product->save();
        return response()->json(array('mes'=>$product->status),200);
    }
    public function image(string $id)
    {
        $images = Image::where('product_id', '=', $id)->get();
        return view('backend.product.upload', compact('images'));
    }
    public function upload(Request $request, $id)
    {
        if ($request->hasFile('images')) {
            $i = 0;
            foreach ($request->file('images') as $file) {
                $image = new Image();
                $filename = Carbon::now()->format('YmdHis') . Carbon::now()->micro . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/products'), $filename);
                $image->name = $filename;
                $image->product_id = $id;
                $image->save();
            }
        }
        else{
            return redirect()->route('product.image', ['id' => $id])->with('success', 'Thất bại');
        }
        return redirect()->route('product.image', ['id' => $id])->with('success', 'thành công');
    }
    public function deleteImage(Request $request, $id)
    {
        if($request->has('image_check')){
            foreach ($request->input('image_check') as $id) {
                $image = Image::find($id);
                $filePath = public_path('images/products/' . $image->name);
                if (file_exists($filePath)) {
                    unlink($filePath);
                    $image->delete();
                }
            }
            return redirect()->route('product.image', ['id' => $image->product_id])->with('success', 'thành công');
        }
        else{
            return redirect()->route('product.image', ['id' => $id])->with('success', 'thất bại');
        }
        
    }
    public function edit(string $id)
    {
        $brands = Brand::select('id', 'name')->get();
        $categorys = Category::select('id', 'name')->get();
        $product = Product::find($id);
        return view('backend.product.edit', compact('product', 'brands', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($product->name, '-');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('pricesale');
        $product->qty = $request->input('qty');
        $product->detail = $request->input('detail');
        $product->metakey = $request->input('metakey');
        $product->metadesc = $request->input('metades');
        $product->created_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filePath = public_path('images/products/' . $product->name);
            if (file_exists($filePath)) {
                unlink($filePath);
                $image->delete();
            }
            $filename = $product->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $filename);
            $product->image = $filename;
        } else if (!empty($imageurl)) {
            $product->image = $request->input('urlimage');
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }
    /**
     * DELETE to trash
     */
    public function setTrash($id)
    {
        $product =  Product::find($id);
        $product->status = 0;
        $product->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
    public function trash()
    {
        $listProduct = Product::where('status','=',0)->get();
        return view('backend.product.trash',compact('listProduct'));
    }
    public function restore()
    {
        $product = Product::find($_POST['data']);
        $product->status = 1;
        $product->save();
        return response()->json(array('mes'=>$product->status),200);
    }

    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $product = Product::find($id);
            $product->status = 0;
            $product->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
    public function destroy()
    {
        $product = Product::find($_POST['data']);
        $product->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
    public function validateName()
    {
        $name = $_POST['data'];
        $product = product::where('name',$name)->get();
        if(count($product)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    public function destroyAll(Request $request)
    {
        if(isset($request->destroy))
        {
            foreach($request->destroy as $id){
                $product = Product::find($id);
                $product->delete();
            }
            return redirect()->route('product.trash')->with('success', 'Xóa thành công');
        }
        else{
            return redirect()->route('product.trash')->with('success', 'Chưa có sản phẩm được chọn');
        }
        
        
    }
}
