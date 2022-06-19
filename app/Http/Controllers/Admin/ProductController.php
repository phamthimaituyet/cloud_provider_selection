<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('admin.pages.product.product', ['products' => $products]);
    }

    public function new($id = null){
        $categories = Category::all();
        $product = Product::find($id);

        return view('admin.pages.product.new', ['categories' => $categories, 'product' => $product]);
    }
}
