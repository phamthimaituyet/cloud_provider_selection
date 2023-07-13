<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Criteria;
use App\Models\Note;
use App\Models\Product;
use App\Models\ProductCriteria;
use App\Models\Project;
use App\Models\Question;
use App\Models\Advise;
use App\Models\ProductSuggestLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function showMyProject()
    {
        if (Auth::user()->role == 3) {
            $myProjects = Project::where('share', 1)->get();
        } else {
            $myProjects = Project::where('user_id', Auth::user()->id)->get();
        }

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
        $project = Project::findOrFail($id);
        $datas = $request->only('name');
        if ($project->update($datas)) {
            return redirect()->back()->withInput()->with('alert', 'Update project success');
        }

        return redirect()->back()->withInput()->with('error', 'Update project failed');
        
    }

    public function deleteMyProject($id) 
    {
        $project = Project::findOrFail($id);
        if ($project->delete()) {
            return redirect()->back()->withInput()->with('alert', 'Delete project success');
        }

        return redirect()->back()->withInput()->with('error', 'Delete project failed');
    }
    
    public function showProduct($id)
    {
        $project = Project::findOrFail($id);
        $message = Advise::where('project_id', $id)->get();
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

        return view('pages.project.project_criteria', compact(['project', 'products', 'message', 'questions_id', 'criterias_id']));
    }

    public function createNote($id) 
    {
        $project = Project::findOrFail($id);
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
            return redirect()->back()->withInput()->with('error', 'Create Failed');
        }
     
        return redirect()->route('myProject.showProduct', ['id' => $id])->with('alert', 'Add Success');
    }

    public function editNote($project_id, $note_id) {
        $project = Project::findOrFail($project_id);
        $note = Note::find($note_id);
        $parent_criterias = Criteria::whereNull('parent_id')->get();

        return view('pages.project.edit_note', compact(['parent_criterias', 'project', 'note']));
    }

    public function updateNote(Request $request, $project_id, $note_id) {
        $note = Note::findOrFail($note_id);
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
            return redirect()->back()->withInput()->with('error', 'Add Failed');
        }
     
        return redirect()->route('myProject.showProduct', ['id' => $project_id])->with('alert', 'Add Success');
    }

    public function deleteNote($project_id, $note_id) 
    {
        $note = Note::findOrFail($note_id);
        if ($note->delete()) {
            return redirect()->route('myProject.showProduct', ['id' => $project_id])->with('alert', 'Delete Success');
        }

        return redirect()->route('myProject.showProduct', ['id' => $project_id])->with('alert', 'Delete Failed');
    }

    public function share($id)
    {
        $project = Project::findOrFail($id);
        $share = 0;
        if (!$project->share) {
            $share = 1;
        }

        $project->update(['share' => $share]);

        return redirect()->back();
    }

    public function message(CommentRequest $request, $id) 
    {
        $checkData = $request->validated();
        $datas = $request->except('_token');
        if ($checkData['content']) {
            $options = [
                'user_id' => Auth::user()->id,
                'project_id' => $id,
                'content' => $datas['content'],
            ];
            Advise::create($options);

            return redirect()->back()->withInput()->with('alert', 'Message sent successfully');
        }

        return redirect()->back()->withInput()->with('error', 'Failed');
    }

    public function showSaveLog($id)
    {
        $project_save = ProductSuggestLog::join('projects', 'projects.id', '=', 'product_suggest_logs.project_id')
            ->select('product_suggest_logs.*', 'projects.name')
            ->where('project_id', $id)->get();

        if (!count($project_save)) {
            abort(404);
        }
        
        $products = Product::all();
        
        return view('pages.user_save.save_log', compact('project_save', 'products'));
    }

    public function saveLog(Request $request, $id) 
    {
        $project = Project::findOrFail($id);
        $option = ['project_id' => $id];
        $body = [];
        $body['product_id'] = $request->product_id;
        $notes = $project->notes;
        foreach ($notes as $note) {
            $body['notes'][$note->id]['text'] = $note->note;
            $questions = $note->questions;

            foreach($questions as $question) {
                $body['notes'][$note->id]['questions'][$question->id]['text'] = $question->question;
                $criterias = $question->criterias;
                foreach($criterias as $criteria) {
                    $body['notes'][$note->id]['questions'][$question->id]['criteria'][] = $criteria->name;
                }
            }
        }

        $option['body'] = json_encode($body);
        if (ProductSuggestLog::create($option)) {
            return redirect()->back()->withInput()->with('alert', 'Saved successfully');
        }

        return redirect()->back()->withInput()->with('error', 'Saved Failed');
    }
}
