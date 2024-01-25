<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listPost = Post::where([['status', '!=', '0'],['type','post']])->get();
        return view('backend.post.index', compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::where('status', '2')->get();
        $html = '';
        foreach ($topics as $item) {
            $html .= "<option value='$item->id'>$item->name</option>";
        }
        return view('backend.post.create', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title, '-');
        $post->topic_id = $request->input('topic_id');
        $post->detail = $request->input('detail');
        $post->metakey = $request->input('metakey');
        $post->metadesc = $request->input('metades');
        $post->type = 'post';
        $post->created_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filename = $post->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $filename);
            $post->image = $filename;
        } else if (!empty($imageurl)) {
            $post->image = $request->input('urlimage');
        } else {
            $post->image = 'post.png';
        }
        $post->save();
        return redirect()->route('post.index')->with('success', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('backend.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topics = Topic::where('status','=' ,'2')->get();
        $post = Post::find($id);
        return view('backend.post.edit',compact('post','topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title, '-');
        $post->topic_id = $request->input('topic_id');
        $post->detail = $request->input('detail');
        $post->metakey = $request->input('metakey');
        $post->metadesc = $request->input('metades');
        $post->type = 'post';
        $post->created_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage'); 
        if (isset($image)) {
            $filePath = public_path('images/posts/' . $post->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = $post->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $filename);
            $post->image = $filename;
        } else if (!empty($imageurl)) {
            $post->image = $request->input('urlimage');
        }
        $post->save();
        return redirect()->route('post.index')->with('success', 'Cập nhật bài viết thất bại');
    }
    public function status($id)
    {
        $post = Post::find($id);
        $post->status = $post->status == 2 ? 1 : 2;
        $post->save();
        return response()->json(array('mes' => $post->status), 200);
    }
    public function validateName()
    {
        $name = $_POST['data'];
        $post = Post::where('title',$name)->get();
        if(count($post)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function setTrash($id)
    {
        $post =  Post::find($id);
        $post->status = 0;
        $post->save();
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
    public function trash()
    {
        $listPost = Post::where([['status', '=', '0'],['type','post']])->get();
        return view('backend.post.trash', compact('listPost'));
    }
    public function restore()
    {
        $post = Post::find($_POST['data']);
        $post->status = 1;
        $post->save();
        return response()->json(array('mes' => $post->status), 200);
    }
    public function destroy()
    {
        $post = Post::find($_POST['data']);
        $post->delete();
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $post = Post::find($id);
            $post->status = 0;
            $post->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $product = Post::find($id);
            $product->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}
