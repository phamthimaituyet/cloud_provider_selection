<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.pages.user.user', ['users' => $users]);
    }

    public function new(){
        dump(2);
    }
}
