<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('admin.pages.vendor.index', ['vendors' => $vendors]);
    }

    public function create()
    {
        return view('admin.pages.vendor.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $datas = $request->except('_token');
            if($file = $request->file('image')){
                $file_path = $file->store('public/images/' . Str::slug($datas['name']));
                unset($datas['image']);
                $datas['img_url'] = 'storage/' . explode("public/", $file_path)[1];
            }

            Vendor::create($datas);
            DB::commit();

            return redirect()->route('vendors.index')->with('alert',"Success");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }

        return redirect()->back()->with('alert',"Failed");
    }

    public function show($id = null)
    {
        $vendor = Vendor::find($id); 

        return view('admin.pages.vendor.show', compact('vendor'));
    }

    public function edit($id = null)
    {
        $vendor = Vendor::find($id);

        return view('admin.pages.vendor.edit', compact('vendor')); 
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $datas = Vendor::find($request->id);
            $edit_data = $request->except('_token');
            if($file = $request->file('image')){
                $file_path = $file->store('public/images/' . Str::slug($datas['name']));
                unset($datas['image']);
                $datas['img_url'] = 'storage/' . explode("public/", $file_path)[1];
            }

            $datas->update($edit_data);
            DB::commit();

            return redirect()->route('vendors.index')->with('alert',"Success");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }

        return redirect()->back()->with('alert',"Failed");
    }

    public function delete(Request $request)
    {
        $vendor = Vendor::find($request->id);

        if (!$vendor->delete()) {
            return redirect()->back()->withInput()->with('error', 'Delete vendor failed');
        }

        return redirect()->back()->withInput()->with('alert', 'Delete vendor success');
    }
}
