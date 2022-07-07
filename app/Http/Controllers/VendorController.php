<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index(){
        $vendors = Vendor::all();
        return view('admin.pages.vendor.index', ['vendors' => $vendors]);
    }
}
