<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        return view('prod_detail', ['product' => $product]);
    }
}
