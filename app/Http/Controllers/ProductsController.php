<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Criteria;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        return view('prod_detail', ['product' => $product]);
    }

    public function review(CommentRequest $request, $id) 
    {
        $validated = $request->validated();
        try {
            if (!$id) {
                return redirect()->back()->withInput()->with('error', 'Create review failed!');
            }
    
            $options = [
                'user_id' => Auth::user()->id,
                'product_id' => $id,
            ];
            if (!empty($validated['rating'])) {
                $optionRating = ['number_star' => $validated['rating'] ?? 0] + $options;
                Rating::create($optionRating);
            }
            
            $optionComment = ['content' => $validated['content']] + $options;
            Comment::create($optionComment);
            return redirect()->back()->withInput()->with('alert', 'Create review success');
        }catch(Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->back()->withInput()->with('error', 'Create review failed!');
    }

    public function detailReview($id)
    {
        $product = Product::where('id', $id)
            ->with(['criterias' => function($query){
                $query->whereNull('parent_id');
            }])->first();
        $criterias = Criteria::whereNull('parent_id')->get();
        return view('detail_review', compact(['product', 'criterias']));
    }

    public function postDetailReview(Request $requests, $id = null) 
    {
        if (!$id || !is_numeric($id)) {
            abort(404, "The product was not found");
        }

        $product = Product::where('id', $id)->first();
        if (!$product) {
            abort(404, "The product was not found");
        }

        $requests = $requests->except('_token');

        $product_criterias = [];
        $option = [
            'product_id' => $id,
            'user_id' => Auth::user()->id,
            'criteria_id' => null,
            'value' => null
        ];
        foreach($requests as $key => $request) {
            $option['criteria_id'] = substr($key, strlen('criteria_id_'));
            $option['value'] = $request;
            $product_criterias[] = $option;
        }
        
        DB::beginTransaction();
        try {
            $product->product_criterias()->delete();
            $product->product_criterias()->createMany($product_criterias);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Create review detail failed!');
        }

        return redirect()->route('show', ['id' => $id])->with('alert', 'Create review detail success!');
    }

    public function support()
    {
        $criterias = Criteria::whereNull('parent_id')->get();
        return view('support_select', compact('criterias'));
    }
}
