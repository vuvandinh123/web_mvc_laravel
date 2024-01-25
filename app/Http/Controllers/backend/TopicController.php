<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listTopic = Topic::where('status','!=',0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.index',compact('listTopic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::where('status','=','2')->get();
        $html='';
        foreach($topics as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.topic.create',compact('html'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->name = $request->input('name');
        $topic->slug = Str::slug($topic->name, '-');
        $topic->parent_id = $request->input('parent_id');
        $topic->metakey = $request->input('metakey');
        $topic->metadesc = $request->input('metades');
        $topic->created_by = 1;
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('success', 'Thêm Thương hiệu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::find($id);
        return view('backend.topic.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        $topics = Topic::where('status','=','2')->get();
        $html='';
        foreach($topics as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.topic.edit',compact('topic','topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->input('name');
        $topic->slug = Str::slug($topic->name, '-');
        $topic->parent_id = $request->input('parent_id');
        $topic->metakey = $request->input('metakey');
        $topic->metadesc = $request->input('metades');
        $topic->created_by = 1;
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('success', 'Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * status change
     */
    public function status($id)
    {
        $topic = Topic::find($id);
        $topic->status = $topic->status == 2 ? 1 : 2;
        $topic->save();
        return response()->json(array('mes'=>$topic),200);
    }
    /**
     * view trash
     */
    public function trash()
    {
        $listTopic = Topic::where('status','=',0)->get();
        return view('backend.topic.trash',compact('listTopic'));
    }
    /**
     * validate name database
     */
    public function validateName()
    {
        $name = $_POST['data'];
        $topic = Topic::where('name',$name)->get();
        if(count($topic)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    /** 
     * restore from trash
    */
    public function restore()
    {
        $topic = Topic::find($_POST['data']);
        $topic->status = 1;
        $topic->save();
        return response()->json(array('mes'=>$topic->status),200);
    }
    /**
     * delete a to trash 
     * */  
    public function setTrash($id)
    {
        $topic =  Topic::find($id);
        $topic->status = 0;
        $topic->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }

    /**
     * delete a lot of to trash 
     * */  
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $topic = Topic::find($id);
            $topic->status = 0;
            $topic->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
     /**
     * remove a to database 
     * */  
    public function destroy()
    {
        $topic = Topic::find($_POST['data']);
        $topic->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
     /**
     * remove a lot of to database 
     * */  
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $topic = Topic::find($id);
            $topic->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}
