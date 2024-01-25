<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('backend.Login.index');
    }
    public function postlogin(Request $request)
    {
        $username  = $request->username;
        $password = $request->password;
        $hashedPassword = bcrypt($password);
        // echo $hashedPassword;
        $data = array('password'=>$password,'roles'=>1);
        if(filter_var($username,FILTER_VALIDATE_EMAIL)){
            $data['email'] = $username;
        }
        else{
            $data['username'] = $username;
            // echo 'username';
        }
        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }
        else{
            $error = 'Tài khoản hoặc mật khẩu không đúng';
            return view('backend.Login.index',compact('error'));
            // return response()->json(array('mes'=>'thanh cong'),200);
        }
        // return view('backend.Login.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    /**
     * Show the form for creating a new resource.
     */
    
}