<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Price;
use App\Models\Criteria;
use DateTime;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        if ($request->search) {
            $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }
       
        // $response = Http::get('https://www.gartner.com/reviews/api2-proxy/reviews/market/seoname/public-cloud-iaas/zeroRatingProducts');
        // dd(json_decode($response)->products);


        return view('admin.pages.product.product', ['products' => $products]);
    }

    public function new(){
        $categories = Category::all();
        $vendors = Vendor::all();

        return view('admin.pages.product.new', ['categories' => $categories, 'vendors' => $vendors]);
    }

    public function postNew(Request $request){
        $data_product = $request->only('name', 'description', 'support','vendor_id', 'category_id');
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
        return redirect()->back()->with('thongbao',"Đăng ký thành công");
    }

    public function view($id = null){
        $product = Product::find($id);
        $prices = Price::find($id);
        $criterias = Criteria::all();
        return view('admin.pages.product.view', ['product' => $product, 'prices' => $prices, 'criterias' => $criterias]);
    }

    public function edit($id = null){
        $product = Product::find($id);
        $categories = Category::all();
        $vendors = Vendor::all();
        $prices = Price::where('product_id', $id)->get();

        return view('admin.pages.product.edit', compact('vendors', 'prices', 'product', 'categories')); 
    }

    public function editPost(Request $request){
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

        return redirect()->back()->withInput()->with('thongbao', 'Update product success');
    }

    public function delete(Request $request){
        $product = Product::find($request->id);

        if (!$product->delete()) {
            return redirect()->back()->withInput()->with('loi', 'Delete product failed');
        }

        return redirect()->back()->withInput()->with('thongbao', 'Delete product success');
    }
}