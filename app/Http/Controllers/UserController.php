<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $datas = $request->only('email', 'password');
 
        if (Auth::attempt($datas)) {
            if(Auth::user()->role == 1){
                return redirect()->route('dashboard')->with('thongbao', 'Đăng nhập thành công');
            }
        }

        return redirect()->back()->withInput()->with('thongbao', 'Đăng nhập thất bại');
    }

    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $datas = $request->only('name', 'email', 'password');
        $re_password = $request->input('re-password');

        if($datas['password'] == $re_password){
            $datas['password'] = Hash::make($datas['password']);
            $datas['role'] = 2;
            $user = User::create($datas);
            if($user){
                return redirect()->route('login');
            }    
        }

        return redirect()->back()->withInput()->with('thongbao', 'Đăng ký thất bại');
    }

    public function index(){
        $users = User::all();

        return view('admin.pages.user.user', ['users' => $users]);
    }
}
