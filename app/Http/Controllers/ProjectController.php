<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Note;
use App\Models\Project;
use App\Models\ProjectCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
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
    
    public function showProduct($id)
    {
        $project = Project::find($id);
       
        return view('project_criteria', compact(['project']));
    }

    public function createNote($id) 
    {
        $project = Project::find($id);
        $parent_criterias = Criteria::whereNull('parent_id')->get();

        return view('create_note', compact(['project', 'parent_criterias']));
    }

    public function addNote(Request $request, $id)
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
