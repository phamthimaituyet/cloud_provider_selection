<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CatrgoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.pages.category.index', ['categories' => $categories]);
    }

    public function show($id = null){

        $category = Category::find($id);

        return view('admin.pages.category.show', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    public function store(Request $request){

        $datas = $request->only('name');
        $categories = Category::create($datas);


        return redirect()->back()->withInput()->with('alert', 'Create category success');
    }

    public function update(Request $request){
        $categories = Category::find($request->id);
        $datas = $request->only('name');
        $categories->update($datas);

        return redirect()->back()->withInput()->with('alert', 'Update category success');
    }

    public function delete(Request $request){
        $category = Category::find($request->id);

        if (!$category->delete()) {
            return redirect()->back()->withInput()->with('error', 'Delete category failed');
        }

        return redirect()->back()->withInput()->with('alert', 'Delete category success');
    }
}
