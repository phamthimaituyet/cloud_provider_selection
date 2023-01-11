<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Price;
use App\Models\Criteria;
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
       
        // $response = Http::get('https://www.gartner.com/reviews/api2-proxy/reviews/market/seoname/public-cloud-iaas/zeroRatingProducts');
        // dd(json_decode($response)->products);


        return view('admin.pages.product.index', ['products' => $products]);
    }

    public function create(){
        $categories = Category::all();
        $vendors = Vendor::all();

        return view('admin.pages.product.create', ['categories' => $categories, 'vendors' => $vendors]);
    }

    public function store(Request $request){
        DB::beginTransaction();             
        try {
            $data_product = $request->only('name', 'description', 'support','vendor_id', 'category_id', 'image');
        
            if($file = $request->file('image')){
                $file_path = $file->store('public/images/' . Str::slug($data_product['name']));
                unset($data_product['image']);
                $data_product['img_url'] = 'storage/' . explode("public/", $file_path)[1];
            }

            $products = Product::create($data_product);
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
        $dataProduct = Product::find($request->id);
        $datas = $request->only('name', 'description', 'support','vendor_id', 'category_id');
        $dataProduct->update($datas);
        $data_prices = $request->only('type', 'price', 'price_id');
        $types = $data_prices['type'];
        $prices = $data_prices['price'];
        $prices_id = $data_prices['price_id'];

        dd($prices_id);
        foreach ($prices_id as $key=>$price_id) {
            $price = Price::find($price_id);
            $price->type = $types[$key];
            $price->price = $prices[$key];
            $price->save();
        }

        return redirect()->back()->withInput()->with('alert', 'Update product success');
    }

    public function delete(Request $request){
        $product = Product::find($request->id);

        if (!$product->delete()) {
            return redirect()->back()->withInput()->with('error', 'Delete product failed');
        }

        return redirect()->back()->withInput()->with('alert', 'Delete product success');
    }
}
