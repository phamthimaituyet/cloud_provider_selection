<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Criteria;

class DashboardController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'DESC');
        $categories = Category::orderBy('created_at', 'DESC');
        $products = Product::orderBy('created_at', 'DESC');
        $criterias = Criteria::orderBy('created_at', 'DESC');
        return view('admin.pages.dashboard.index', ['users' => $users, 'categories' => $categories, 'products' => $products, 'criterias' => $criterias]);    
    }
}
