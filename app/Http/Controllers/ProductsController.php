<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        return view('prod_detail', ['product' => $product]);
    }

    public function reviewStar(Request $request, $id) 
    {
        if (!$id) {
            return redirect()->back()->withInput()->with('error', 'Create review failed!');
        }

        $options = [
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'number_star' => $request->rating ?? 0
        ];

        if (Rating::create($options)) {
            return redirect()->back()->withInput()->with('alert', 'Create review success');
        }

        return redirect()->back()->withInput()->with('error', 'Create review failed!');
    }
}
