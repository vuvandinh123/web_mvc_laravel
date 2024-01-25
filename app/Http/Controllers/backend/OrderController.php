<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listOrder = Order::where('status','!=','0')->get();
        return view('backend.order.index',compact('listOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.order.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        $orderdetail = Orderdetail::find($id);
        return view('backend.order.show',compact('order','orderdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.order.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function status($id)
    {
        $order = Order::find($id);
        $order->status = $order->status == 2 ? 1 : 2;
        $order->save();
        return response()->json(array('mes'=>$order),200);
    }
    public function trash()
    {
        $listOrder = Order::where('status','=',0)->get();
        return view('backend.order.trash',compact('listOrder'));
    }
    public function validateName()
    {
        $name = $_POST['data'];
        $order = Order::where('name',$name)->get();
        if(count($order)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    // khoi phuc trong thung rac
    public function restore()
    {
        $order = Order::find($_POST['data']);
        $order->status = 1;
        $order->save();
        return response()->json(array('mes'=>$order->status),200);
    }
    // xoa san pham vo thung rac
    public function setTrash($id)
    {
        $order =  Order::find($id);
        $order->status = 0;
        $order->save();
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
            $order = Order::find($id);
            $order->status = 0;
            $order->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
    public function destroy()
    {
        $order = Order::find($_POST['data']);
        $order->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $order = Order::find($id);
            $order->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }

}
