<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->provider;
        $products = Product::join('vendors', 'products.vendor_id', '=', 'vendors.id')
            ->select(
                'products.id',
                'products.name',
                'products.description',
                'products.img_url',
                'products.vendor_id'
            )
            ->whereIn('vendors.id', $data)
            ->with('vendor')
            ->withAvg('ratings', 'number_star')
            ->orderBy('products.created_at', 'desc')
            ->paginate(6);
        // dd($products);


        return view('components.home.main', compact('products'));
    }
}
