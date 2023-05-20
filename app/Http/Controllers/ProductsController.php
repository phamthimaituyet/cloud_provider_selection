<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Criteria;
use App\Models\Note;
use App\Models\ProductCriteria;
use App\Models\Project;
use App\Models\ProjectCriteria;
use App\Models\Vendor;
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
        $reviews = Comment::join('ratings', function ($query) {
            $query->on('ratings.user_id', '=', 'comments.user_id')
                ->on('ratings.product_id', '=', 'comments.product_id');
        })
            ->where('comments.product_id', $id)
            ->orderBy('comments.created_at', 'desc');
        $ratings = Rating::where('product_id', $id);
        $reviews = $reviews->paginate(10);
        $review_stars = [];
        for ($i = 5; $i >= 1; $i--) {
            $review_stars[] = $reviews->where('number_star', $i)->count();
        }

        return view('prod_detail', compact('product', 'reviews', 'ratings', 'review_stars'));
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
                $ratinged = Rating::where($options)->first();
                if ($ratinged) {
                    $ratinged->update(['number_star' => $validated['rating']]);
                } else {
                    $optionRating = ['number_star' => $validated['rating'] ?? 0] + $options;
                    Rating::create($optionRating);
                }
            }

            $optionComment = ['content' => $validated['content']] + $options;
            Comment::create($optionComment);
            return redirect()->back()->withInput()->with('alert', 'Create review success');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->back()->withInput()->with('error', 'Create review failed!');
    }

    public function detailReview($id)
    {
        $product = Product::where('id', $id)
            ->with(['criterias' => function ($query) {
                $query->whereNull('parent_id');
            }])->first();
        $reviews = Comment::join('ratings', function ($query) {
            $query->on('ratings.user_id', '=', 'comments.user_id')
                ->on('ratings.product_id', '=', 'comments.product_id');
        })
            ->where('comments.product_id', $id)
            ->orderBy('comments.created_at', 'desc');
        $criterias = Criteria::whereNull('parent_id')->get();
        return view('detail_review', compact(['product', 'criterias', 'reviews']));
    }

    public function postDetailReview(Request $requests, $id = null)
    {
        if (!$id || !is_numeric($id)) {
            abort(404, "The product was not found");    // check co ton tai id khong va id co phai la so khong
        }

        $product = Product::where('id', $id)->first();
        if (!$product) {
            abort(404, "The product was not found");    // check product_id co ton tai khong
        }

        $requests = $requests->except('_token');        // lay ca requests, loai bo token

        $product_criterias = [];
        $option = [
            'product_id' => $id,
            'user_id' => Auth::user()->id,
            'criteria_id' => null,
            'value' => null
        ];
        foreach ($requests as $key => $request) {
            $option['criteria_id'] = substr($key, strlen('criteria_id_'));  // cat chuoi de lay id
            $option['value'] = $request;
            $product_criterias[] = $option;
        }

        DB::beginTransaction();
        try {
            $product->product_criterias()->delete();                        // delete data ma nguoi dung da danh gia truoc do
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
        $criterias_id = Criteria::where('weight', '<>', '')
            ->WhereNotNull('weight')
            ->pluck('id')
            ->toArray();
       
        $product_criterias = ProductCriteria::join('criterias', 'criterias.id', '=', 'product_criterias.criteria_id')
            ->select(
                'product_id',
                'criteria_id',
                DB::raw('SUM(value * weight)/count(*) AS sum')
            )
            ->whereIn('criteria_id', $criterias_id)
            ->groupBy('product_id', 'criteria_id');

        $products_id = DB::table($product_criterias)
            ->select(
                'product_id',
                DB::raw('SUM(sum) AS Total')
            )
            ->groupBy('product_id')
            ->orderByDesc('Total')
            ->take(5);

        $products_id = DB::table($products_id)->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $products_id)
            ->orderBy('created_at', 'desc')
            ->withAvg('ratings', 'number_star')->paginate(6);

        return view('support_select', compact('products'));
    }

    public function showMyProject()
    {
        $myProjects = Project::where('user_id', Auth::user()->id)->get();

        return view('my_project', compact('myProjects'));
    }

    public function createMyProject(Request $request)
    {
        $name = $request->name;
        $project = Project::where('user_id', Auth::user()->id)->where('name', $name)->first();
        if (!is_null($project)) {
            return redirect()->back()->withInput()->with('error', 'Name project exists');
        }

        $options = [
            'user_id' => Auth::user()->id,
            'name'    => $name ?? ''
        ];

        if (Project::create($options)) {
            return redirect()->back()->withInput()->with('alert', 'Create project success');
        }

        return redirect()->back()->withInput()->with('error', 'Create project fail');
    }

    public function addCriteria($id)
    {
        $project = Project::find($id);
        $parent_criterias = Criteria::whereNull('parent_id')->get();
        $projectCriterias = ProjectCriteria::select('note_id')
            ->where('project_id', $id)
            ->groupBy('note_id')
            ->get();

        $criterias_id = ProjectCriteria::where('project_id', $id)
            ->groupBy('criteria_id')
            ->pluck('criteria_id')
            ->toArray();
          
        $criterias_id = Criteria::where('weight', '<>', '')
            ->whereIn('id', $criterias_id)
            ->WhereNotNull('weight')
            ->pluck('id')
            ->toArray();
         
        $product_criterias = ProductCriteria::join('criterias', 'criterias.id', '=', 'product_criterias.criteria_id')
            ->select(
                'product_id',
                'criteria_id',
                DB::raw('SUM(value * weight)/count(*) AS sum')
            )
            ->whereIn('criteria_id', $criterias_id)
            ->groupBy('product_id', 'criteria_id');
         
        $product_id = DB::table($product_criterias)
            ->select(
                'product_id',
                DB::raw('SUM(sum) AS Total')
            )
            ->groupBy('product_id')
            ->orderByDesc('Total')
            ->take(2);
        $products_id = DB::table($product_id)->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $products_id)
            ->orderBy('created_at', 'desc')
            ->withAvg('ratings', 'number_star')->get();
       
        return view('project_criteria', compact(['project', 'parent_criterias', 'projectCriterias', 'products']));
    }

    public function createCriteria(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $datas = $request->except('_token');
        DB::beginTransaction();
        try {
            foreach ($datas['note'] as $key => $note) {
                $note = Note::create(['note' => $note]);

                $options = [];
                $option = [
                    'note_id' => $note->id
                ];
                foreach($datas['criteria_id'][$key] as $criteria_id) {
                    $option['criteria_id'] = $criteria_id;
                    $options[] = $option;
                }
               
                $project->projectCriterias()->createMany($options);
            }

            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Fail');
        }
     
        return redirect()->back()->withInput()->with('alert', 'Success');
    }
}
