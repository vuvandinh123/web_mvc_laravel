<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use Faker\Core\Number;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listMenu = Menu::where([['status','!=','0']])->get();
        $listCategory = Category::where('status','2')->get();
        $listBrand = Brand::where('status','2')->get();
        return view('backend.menu.index',compact('listMenu','listCategory','listBrand'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.create');
    }
    public function pust()
    {
        $item= $_POST['data'];
        for($i=0;$i<count($item)-1;$i++){
            $category = Category::find($item[$i]);
            $menu = new Menu();
            $menu->name = $category->name;
            $menu->link=  "index.php/product/category/".$category->slug;
            $menu->table_id = $item[count($item)-1];
            $menu->type = $item[count($item)-1] == 1 ? 'Main Menu' : 'Footer Menu';
            $menu->created_by = 1;
            $menu->updated_by = 1;
            $menu->sort_order = 0;
            $menu->save();
        }
        return response()->json(array('mes'=>$item),200);
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.menu.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.menu.edit');
    }
    public function editMenu(Request $request)
    {
        $value = (int)$_POST['data'] ;
        $sort = Menu::where([['status',2],['postion',$value]])->get();
        $rank=[];
        if($value>1){
            $rank = Menu::where([['status',2],['postion',$value-1]])->get();
        }

        return response()->json(array('rank'=>$rank),200);
        
    }
    public function editSort(Request $request)
    {
        $value = (int)$_POST['data'] ;
        $sort = Menu::where([['status',2],['parent_id',$value]])->get();

        return response()->json(array('sort'=>$sort),200);
        
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->sort_order=  $request->sort_order ?? 0;
        $menu->parent_id = $request -> parent_id;
        $menu->link = $request->link;
        $menu->type = $request->type;
        $menu->postion = $request->rank;
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'cập nhật menu thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //3
    }
    public function position(Request $request)
    {
        $value = $request->data;

            $menu = Menu::where('type','=',$value)->get();
            return response()->json(array('mes'=>$menu),200);
        
    }
}
