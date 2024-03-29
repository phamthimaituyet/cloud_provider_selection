<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request = $request->all();
        $key_word = $request['key_word'] ?? '';
        $category_name = $request['category_name'] ?? '';
        $provider_id = $request['provider_id'] ?? [];
        $rating_value = $request['rating_value'] ?? 0;
        $certificate = $request['certificate'] ?? '';
        $text = $request['text'] ?? '';
        $products = Product::select(
                'products.id',
                'products.name',
                'products.description',
                'products.img_url',
                'products.vendor_id',
                'products.created_at'
            )
            ->with('vendor')
            ->withAvg('ratings', 'number_star')
            ->when($key_word, function ($query) use ($key_word) {
                return $query->where('products.name', 'like', "%$key_word%");
            })
            ->when($category_name, function ($query) use ($category_name) {
                return $query->join('categories', 'products.category_id', '=', 'categories.id')
                        ->where('categories.name', $category_name);
            })
            ->when(!empty($provider_id), function ($query) use ($provider_id) {
                return $query->join('vendors', 'products.vendor_id', '=', 'vendors.id')
                        ->whereIn('vendors.id', $provider_id);
            })
            ->when($rating_value, function ($query) use ($rating_value) {
                // su dung havingRaw de viet mySql co chua bieu thuc tinh toan ( round, count )
                return $query->havingRaw("ROUND(ratings_avg_number_star) = $rating_value");
            })
            ->when($certificate, function ($query) use ($certificate) {
                return $query->where('products.certificate', 'LIKE', '%' . $certificate . '%');
            });

            switch ($text) {
                case 'Newest':
                    $products = $products->when($text, function ($query) { 
                        return $query->orderBy('created_at', 'desc');
                    });
                    break;
                case 'Trending':
                    $products = $products->when($text, function ($query) {
                        return $query->leftJoin('comments', 'comments.product_id', '=', 'products.id')
                            ->addSelect(
                                DB::raw('count(content) AS sum')
                            )
                            ->groupBy('products.id')
                            ->orderBy('sum', 'desc');
                    });
                    break;
                case 'Best rated':
                    $products = $products->leftJoin('product_criterias', 'product_criterias.product_id', '=', 'products.id')
                        ->addSelect(
                            'product_criterias.criteria_id',
                            DB::raw('SUM(value)/count(*) AS sum')
                        )
                        ->groupBy('products.id')
                        ->orderByDesc('sum');
                    break;
            }

            $products = $products->paginate(6);

        return view('components.home.main', compact('products'));
    }
}
