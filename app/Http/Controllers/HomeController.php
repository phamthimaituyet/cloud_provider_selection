<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Vendor;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $providers = Vendor::all();
        $reviews = Comment::all();
        $ratings = Rating::all()->toArray();
        $ratings = collect($ratings);
           
        return view('home', compact('categories', 'providers', 'reviews', 'ratings'));
    }
}
