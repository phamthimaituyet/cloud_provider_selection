<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Price;
use App\Models\Criteria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        if ($request->search) {
            $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }

        return view('admin.pages.product.index', ['products' => $products]);
    }

    public function create(){
        $categories = Category::all();
        $vendors = Vendor::all();
        $criterias = Criteria::whereNull('parent_id')->get();

        return view('admin.pages.product.create', compact('categories', 'vendors', 'criterias'));
    }

    public function store(Request $request){
        DB::beginTransaction();             
        try {
            $data_product = $request->only('name', 'description', 'support','vendor_id', 'category_id', 'image', 'certificate');
            $data_product['certificate'] = json_encode($data_product['certificate']);
            if($file = $request->file('image')){
                $file_path = $file->store('public/images/' . Str::slug($data_product['name']));
                unset($data_product['image']);
                $data_product['img_url'] = 'storage/' . explode("public/", $file_path)[1];
            }

            // tao thuoc tinh co ban trong product (name, image, description,...)
            $products = Product::create($data_product);

            // luu gia (price)
            $data_prices = $request->only('type', 'price');
            $types = $data_prices['type'];
            $prices = $data_prices['price'];
            foreach ($types as $key=>$value) {
                $price = new Price;
                $price->type = $value;
                $price->price = $prices[$key];
                $price->date_use = 30;
                $price->product_id = $products->id;
                $price->save();
            }

            // luu value tieu chi (criteria)
            $data_criterias = $request->except(['_token', 'name', 'description', 'support','vendor_id', 'category_id', 'image', 'certificate', 'type', 'price']);
            $product_criterias = [];
            $option = [
                'product_id' => $products->id,
                'user_id' => Auth::user()->id,
                'criteria_id' => null,
                'value' => null
            ];
            foreach ($data_criterias as $key => $request) {
                $option['criteria_id'] = substr($key, strlen('criteria_id_'));  // cat chuoi de lay id
                $option['value'] = $request;
                $product_criterias[] = $option;
            }
            
            $products->product_criterias()->createMany($product_criterias);
            DB::commit();
            return redirect()->back()->with('alert',"Success");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
        
        return redirect()->back()->with('alert',"Failed");
    }

    public function show($id = null){
        $product = Product::find($id);
        $prices = Price::find($id);
        $criterias = Criteria::all();
        
        return view('admin.pages.product.show', ['product' => $product, 'prices' => $prices, 'criterias' => $criterias]);
    }

    public function edit($id = null){
        $product = Product::find($id);
        $categories = Category::all();
        $vendors = Vendor::all();
        $prices = Price::where('product_id', $id)->get();

        return view('admin.pages.product.edit', compact('vendors', 'prices', 'product', 'categories')); 
    }

    public function update(Request $request){
        DB::beginTransaction();
        try{
            $dataProduct = Product::find($request->id);
            $datas = $request->only('name', 'description', 'support','vendor_id', 'category_id', 'image', 'certificate');
            $datas['certificate'] = json_encode($datas['certificate']);

            if($file = $request->file('image')){
                $file_path = $file->store('public/images/' . Str::slug($datas['name']));
                unset($datas['image']);
                $datas['img_url'] = 'storage/' . explode("public/", $file_path)[1];
            }

            $dataProduct->update($datas);
            $data_prices = $request->only('type', 'price', 'price_id');
            $types = $data_prices['type'];
            $prices = $data_prices['price'];
            $prices_id = $data_prices['price_id'];
            foreach ($prices_id as $key=>$price_id) {
                $price = Price::find($price_id);
                $price->type = $types[$key];
                $price->price = $prices[$key];
                $price->save();
                DB::commit();

                return redirect()->back()->withInput()->with('alert', 'Update product success');
            }
    
        } catch(\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }

        return redirect()->back()->withInput()->with('alert', 'Update product Failed');
    }

    public function delete(Request $request){
        $product = Product::find($request->id);

        if (!$product->delete()) {
            return redirect()->back()->withInput()->with('error', 'Delete product failed');
        }

        return redirect()->back()->withInput()->with('alert', 'Delete product success');
    }
}
