<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Vendor;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query->all();
        $query_category = $query['category_name'] ?? '';
        $query_key_word = $query['q'] ?? '';
        $categories = Category::all();
        $products = Product::when($query_category, function ($query) use($query_category) {
                return $query->join('categories', 'products.category_id', '=', 'categories.id')
                    ->where('categories.name', $query_category);
            })
            ->when($query_key_word, function ($query) use($query_key_word) {
                return $query->where('products.name', 'like', "%$query_key_word%");
            })
            ->withAvg('ratings', 'number_star')
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        $providers = Vendor::all();
        $reviews = Comment::all();
        $ratings = Rating::all();
           
        return view('home', compact('categories', 'products', 'providers', 'reviews', 'query', 'ratings'));
    }
}
