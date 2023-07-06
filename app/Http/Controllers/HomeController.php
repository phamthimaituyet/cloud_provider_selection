<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
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
        $certificates_pluck = Product::where('certificate', '<>', '')
            ->pluck('certificate');
        
        $certificates = [];
        foreach ($certificates_pluck as $certificate){
            $certificates = array_merge($certificates, $certificate);
        }
        $certificates = array_unique($certificates);

        return view('home', compact('categories', 'providers', 'reviews', 'ratings', 'certificates'));
    }
}
