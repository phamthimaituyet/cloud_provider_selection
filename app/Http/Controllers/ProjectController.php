<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Note;
use App\Models\Product;
use App\Models\ProductCriteria;
use App\Models\Project;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Matcher\Not;

class ProjectController extends Controller
{
    public function showMyProject()
    {
        $myProjects = Project::where('user_id', Auth::user()->id)->get();

        return view('pages.project.my_project', compact('myProjects'));
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

    public function updateMyProject(Request $request, $id) 
    {
        $project = Project::find($id);
        $datas = $request->only('name');
        if ($project->update($datas)) {
            return redirect()->back()->withInput()->with('alert', 'Update project success');
        }

        return redirect()->back()->withInput()->with('error', 'Update project failed');
        
    }

    public function deleteMyProject($id) 
    {
        $project = Project::find($id);
        if ($project->delete()) {
            return redirect()->back()->withInput()->with('alert', 'Delete project success');
        }

        return redirect()->back()->withInput()->with('error', 'Delete project failed');
    }
    
    public function showProduct($id)
    {
        $project = Project::find($id);
        $questions_id = Question::join('notes', 'questions.note_id', '=', 'notes.id')
            ->where('notes.project_id', $id)
            ->pluck('questions.id')
            ->toArray();

        $criterias_id = Criteria::join('question_criterias', 'question_criterias.criterias_id', '=', 'criterias.id')
            ->whereIn('question_criterias.question_id', $questions_id)
            ->where('criterias.weight', '<>', '')
            ->WhereNotNull('criterias.weight')
            ->groupBy('question_criterias.criterias_id')
            ->select('question_criterias.criterias_id')
            ->pluck('question_criterias.criterias_id')
            ->toArray();

        $products = null;
        if (!empty($criterias_id)) {
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
                ->take(2);

            $products_id = DB::table($products_id)->pluck('product_id')->toArray();
            $products = Product::whereIn('id', $products_id)
                ->orderBy('created_at', 'desc')
                ->withAvg('ratings', 'number_star')->get();
        }
        
        return view('pages.project.project_criteria', compact(['project', 'products']));
    }

    public function createNote($id) 
    {
        $project = Project::find($id);
        $parent_criterias = Criteria::whereNull('parent_id')->get();

        return view('pages.project.create_note', compact(['project', 'parent_criterias']));
    }

    public function addNote(Request $request, $id)
    {
        $datas = $request->except('_token');
        DB::beginTransaction();
        try {
            $note = Note::create([
                'note' => $datas['note'],
                'user_id' => Auth::user()->id,
                'project_id' => $id

            ]);
            foreach ($datas['question'] as $key => $question) {
                $option = [
                    'note_id' => $note->id,
                    'user_id' => Auth::user()->id,
                    'question' => $question,
                ];
                $question = Question::create($option);
                $options = [];
                foreach($datas['criteria_id'][$key] as $criteria_id) {
                    $option_criteria['criterias_id'] = $criteria_id;
                    $options[] = $option_criteria;
                }
                $question->questionCriterias()->createMany($options);
            }

            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Fail');
        }
     
        return redirect()->route('myProject.showProduct', ['id' => $id])->with('alert', 'Success');
    }

    public function editNote($project_id, $note_id) {
        $project = Project::find($project_id);
        $note = Note::find($note_id);
        $parent_criterias = Criteria::whereNull('parent_id')->get();

        return view('pages.project.edit_note', compact(['parent_criterias', 'project', 'note']));
    }

    public function updateNote(Request $request, $project_id, $note_id) {
        $note = Note::find($note_id);
        $questions = Question::where('note_id', $note_id)->get();
        $datas = $request->except('_token');
        DB::beginTransaction();
        try {
            $note->update(["note" => $datas['note']]);
            foreach ($questions as $key => $question) {
                $question->update(["question" => $datas['question'][$key]]);
                $options = [];
                foreach($datas['criteria_id'][$key] as $criteria_id) {
                    $option_criteria['criterias_id'] = $criteria_id;
                    $options[] = $option_criteria;
                }
                $question->questionCriterias()->delete();
                $question->questionCriterias()->createMany($options);
            }

            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Fail');
        }
     
        return redirect()->route('myProject.showProduct', ['id' => $project_id])->with('alert', 'Success');
    }

    public function deleteNote($project_id, $note_id) 
    {
        $note = Note::find($note_id);
        if ($note->delete()) {
            return redirect()->route('myProject.showProduct', ['id' => $project_id])->with('alert', 'Success');
        }

        return redirect()->route('myProject.showProduct', ['id' => $project_id])->with('alert', 'Failed');
    }
}
