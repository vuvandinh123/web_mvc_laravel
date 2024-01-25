<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listContact = Contact::all();
        return view('backend.contact.index',compact('listContact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact.create');
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
        return view('backend.contact.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.contact.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * status change
     */
    public function status($id)
    {
        $contact = Contact::find($id);
        $contact->status = $contact->status == 2 ? 1 : 2;
        $contact->save();
        return response()->json(array('mes'=>$contact),200);
    }
    /**
     * view trash
     */
    public function trash()
    {
        $listContact = Contact::where('status','=',0)->get();
        return view('backend.contact.trash',compact('listContact'));
    }
    /**
     * validate name database
     */
    public function validateName()
    {
        $name = $_POST['data'];
        $contact = Contact::where('name',$name)->get();
        if(count($contact)>0){
            return response()->json(array('mes' => 1), 200);
        }
        return response()->json(array('mes' => 0), 200);
    }
    /** 
     * restore from trash
    */
    public function restore()
    {
        $contact = Contact::find($_POST['data']);
        $contact->status = 1;
        $contact->save();
        return response()->json(array('mes'=>$contact->status),200);
    }
    /**
     * delete a to trash 
     * */  
    public function setTrash($id)
    {
        $contact =  Contact::find($id);
        $contact->status = 0;
        $contact->save();
        return response()->json(array('mes'=>'thanh cong'),200);
    }

    /**
     * delete a lot of to trash 
     * */  
    public function deleteAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $contact = Contact::find($id);
            $contact->status = 0;
            $contact->save();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
        
        
    }
     /**
     * remove a to database 
     * */  
    public function destroy()
    {
        $contact = Contact::find($_POST['data']);
        $contact->delete();
        return response()->json(array('mes'=>'thanh cong'),200);
    }
     /**
     * remove a lot of to database 
     * */  
    public function destroyAll()
    {
        $data = $_POST['data'];
        foreach ($data as $id) {
            $contact = Contact::find($id);
            $contact->delete();
        }
        return response()->json(array('mes' => 'thanh cong'), 200);
    }
}
