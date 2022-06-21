<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Property;
use App\Models\Proposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    
public $project;
public $formal;
public $informal;

public function index()
    {
        $project = Project::all();
        
        return view('admin.projects', compact('project'));
    }



    public function create()
    {
        return view('admin.createproject');
    }

    public function store(Request $request)
    {
      try{
        DB::beginTransaction();

 $i = 1 ;
           

        $project = new Project;
        $project->name = $request->input('name');
        $project->content = $request->input('content');
       
        $project->save();
     
        $auto_prop =  $request->input('auto_prop');
        $auto_prop2 =  $request->input('auto_prop2');
        $auto_prop3 =  $request->input('auto_prop3');
        $auto_prop4 =  $request->input('auto_prop4');
        $auto_prop5 =  $request->input('auto_prop5');
        
        $proposition = new Proposition;
        $proposition->auto_prop = $request->input('auto_prop');
        $proposition->id_project = $project->id; 
        $proposition->save();
       
        if(!($auto_prop2 == "")){
            $proposition2 = new Proposition;
            $proposition2->auto_prop = $request->input('auto_prop2');
            $proposition2->id_project = $project->id; 
            $proposition2->save();
       }

            if(!($auto_prop3 == "")){
                $proposition3 = new Proposition;
                $proposition3->auto_prop = $request->input('auto_prop3');
                $proposition3->id_project = $project->id; 
                $proposition3->save();
               }
               if(!($auto_prop4 == "")){
                $proposition4 = new Proposition;
                $proposition4->auto_prop = $request->input('auto_prop4');
                $proposition4->id_project = $project->id; 
                $proposition4->save();
               }
               if(!($auto_prop5 == "")){
                $proposition5 = new Proposition;
                $proposition5->auto_prop = $request->input('auto_prop5');
                $proposition5->id_project = $project->id; 
                $proposition5->save();
               }
    
               DB::commit();
            return redirect()->back()->withSuccess(['Project Added Successfully']);
        }catch(\Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->withExp(['There is something wrong']);
        }
                        
    }

   

    //public function edit($id){$project = Project::find($id);return view('admin.editproject');}

    //public function update(Request $request, $id)
    //{
        //$project = Project::find($id);
        //$project->name = $request->input('name');
        //$project->content = $request->input('content');
       
        //$project->update();
        //return redirect()->back()->with('status','Project Updated Successfully');
    //}

    public function edit(Project $project)
    {
        return view('admin.editproject',['project' => $project ]);
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
        'name' => 'required',
        'content' => 'required',
        ]);
       
        $project->update($attributes);
       
        return redirect()->back()->with('status','Project Added Successfully');
    }

    public function destroy(Project $project){
        
    $project ->delete();
    return redirect(route('all_projects'));

    return view('admin.projects', compact('project')); 
    }

    public function details(Project $project)
    {
        $groupTwo = Property::all();
   $test = '1';

        return view('admin.projectdetails',['project' => $project  ],compact( 'groupTwo','test'));
      
    }

   public function help(){
       return view('admin.help');
   }
   public function searsh(Request $request)
   {

       $search = $request->input('search');
       $project = Project::where('name','like','%' .$search. '%')->paginate(5);
       return view('admin.searsh',['project' => $project]);
   }
    
 
}
