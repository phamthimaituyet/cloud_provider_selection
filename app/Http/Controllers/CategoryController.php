<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.pages.category.category', ['categories' => $categories]);
    }

    public function view($id = null){

        $category = Category::find($id);

        return view('admin.pages.category.view', ['category' => $category]);
    }
}
