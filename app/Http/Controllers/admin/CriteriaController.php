<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;

class CriteriaController extends Controller
{
    public function index(){
        $criterias = Criteria::all();

        return view('admin.pages.criteria.index', ['criterias' => $criterias]);
    }

    
    
}
