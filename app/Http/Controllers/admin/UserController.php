<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(UserRequest $request)
    {
        $validated = $request->validated();
        $datas = [
            'email' => $validated['email'],
            'password' => $validated['password']
        ];
 
        if (Auth::attempt($datas)) {
            if(Auth::user()->role == 1){
                return redirect()->route('dashboard')->with('alert', 'Success');
            }
            else {
                return redirect()->route('home')->with('alert', 'Success');
            }
        }

        return redirect()->back()->withInput()->with('error', 'The provided credentials do not match our records.');
    }

    public function register(){
        return view('auth.register');
    }

    public function postRegister(UserRequest $request){
        $validated = $request->validated();
        $datas = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'confirm_password' => $validated['confirm_password']
        ];

        if($datas['password'] == $datas['confirm_password']){
            $datas['password'] = Hash::make($datas['password']);
            $datas['role'] = 2;
            $user = User::create($datas);
            if($user){
                return redirect()->route('login');
            }    
        }

        return redirect()->back()->withInput()->with('alert', 'Failed');
    }

    public function index(Request $request){
        $users = User::all();

        if ($request->search) {
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }

        return view('admin.pages.user.index', ['users' => $users]);
    }

    public function showAdmin($id = null){
        $user = User::find($id);
        
        return view('admin.pages.user.show', ['user' => $user]); 

    }

    public function edit($id = null){

        $user = User::find($id);

        return view('admin.pages.user.edit', ['user' => $user]);

    }

    public function update($id = null, UserRequest $request){
        $request->validated();
        $user = User::find($id);
        $validated = $request->only(['name', 'role']);
        $user->update($validated);
        return redirect()->back()->withInput()->with('alert', 'Edit success');
    }

    public function delete(Request $request){
        $user = User::find($request->id);

        if (!$user->delete()) {
            return redirect()->back()->withInput()->with('alert', 'Delete user failed');
        }

        return redirect()->back()->withInput()->with('alert', 'Delete user success');
    }

    public function logout () {
        Auth::logout();
        
        return redirect('/login');
    }

    public function showUser($id = null) {
        $user = Auth::user();
        
        return view('profile', compact('user')); 
    }

    public function editProfile(Request $request) {
        $user = User::find(Auth::user()->id);
        $option = $request->except('_token');

        if ($option['password'] && $option['password'] == $option['confirm']) {
            $option['password'] = Hash::make($option['password']);
        } else {
            unset($option['password']);
            unset($option['confirm']);
        }

        if($file = $request->file('avatar')) {
            $file_path = $file->store('public/images/' . Str::slug($option['name']));
            unset($option['avatar']);
            $option['avatar'] = 'storage/' . explode("public/", $file_path)[1];
        }

        if($user->update($option)) {
            return redirect()->back()->withInput()->with('alert', 'Update proflie success');
        }

        return redirect()->back()->withInput()->with('error', 'Update proflie failed');
    }
}
