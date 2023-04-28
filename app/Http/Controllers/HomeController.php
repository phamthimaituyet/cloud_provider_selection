<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vendor;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $key_word = $request->q ?? '';
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc');
        if ($key_word) {
            $products = $products->where('name', 'like', "%$key_word%");
        }
        $products = $products->paginate(6);
        $providers = Vendor::all();
        
        return view('home', compact('categories', 'products', 'providers'));
    }
}
