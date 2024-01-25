<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listUser = User::all();
        return view('backend.user.index',compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');

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
        return view('backend.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * status change
     */
    public function status($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 2 ? 1 : 2;
        $user->save();
        return response()->json(array('mes'=>$user),200);
    }
    /**
     * view trash
     */
    public function trash()
    {
        $listUser = User::where('status','=',0)->get();
        return view('backend.user.trash',compact('listUser'));
    }
    /**
     * validate name database
     */
    public function validateName()
    {
        $name = $_POST['data'];
        $user = User::where('name',$name)->get();
        if(count($user)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    /** 
     * restore from trash
    */
    public function restore()
    {
        $user = User::find($_POST['data']);
        $user->status = 1;
        $user->save();
        return response()->json(array('mes'=>$user->status),200);
    }
    /**
     * delete a to trash 
     * */  
    public function setTrash($id)
    {
        $user =  User::find($id);
        $user->status = 0;
        $user->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }

    /**
     * delete a lot of to trash 
     * */  
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $user = User::find($id);
            $user->status = 0;
            $user->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
     /**
     * remove a to database 
     * */  
    public function destroy()
    {
        $user = User::find($_POST['data']);
        $user->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
     /**
     * remove a lot of to database 
     * */  
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $user = User::find($id);
            $user->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}