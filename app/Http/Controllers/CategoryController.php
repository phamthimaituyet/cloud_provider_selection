<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CatrgoryRequest;

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

    public function postNew(Request $request){

        $datas = $request->only('name');
        $categories = Category::create($datas);


        return redirect()->back()->withInput()->with('thongbao', 'Create category success');
    }

    public function edit(Request $request){
        $categories = Category::find($request->id);
        $datas = $request->only('name');
        dd($categories);
        $categories->update($datas);

        return redirect()->back()->withInput()->with('thongbao', 'Update category success');
    }

    public function delete(Request $request){
        $category = Category::find($request->id);

        if (!$category->delete()) {
            return redirect()->back()->withInput()->with('loi', 'Delete category failed');
        }

        return redirect()->back()->withInput()->with('thongbao', 'Delete category success');
    }
}
