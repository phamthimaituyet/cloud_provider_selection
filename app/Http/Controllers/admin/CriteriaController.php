<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CriteriaController extends Controller
{
    public function index(){
        $criterias = Criteria::all();

        return view('admin.pages.criteria.index', ['criterias' => $criterias]);
    }

    public function create() 
    {
        $factors = Criteria::orWhereNull('parent_id')->get();

        return view('admin.pages.criteria.create', compact('factors'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();             
        try {
            $datas = $request->all();

            dd($datas);

            DB::commit();
            return redirect()->back()->with('alert',"Add Success");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
        
        return redirect()->back()->with('alert',"Add Failed");
    }

    public function edit($id = null)
    {
        $criteria = Criteria::find($id);

        return view('admin.pages.criteria.edit', compact('criteria')); 
    }
    
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $datas = Criteria::find($request->id);
            $edit_data = $request->except('_token');
            $datas->update($edit_data);
            DB::commit();

            return redirect()->route('criterias.index')->with('alert',"Success");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }

        return redirect()->back()->with('alert',"Failed");
    }
    
}
