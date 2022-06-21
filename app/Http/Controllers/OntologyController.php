<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Proposition;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Storage;

class OntologyController extends Controller
{
   
    public function index(Project $project){
        $formal='';
        $informal='';
        $nl_formula =DB::table('ontologies')->select('nl_formula')->get();
         
        return view('admin.ontology',['project' => $project] , compact('formal','informal','nl_formula'));
    }   
    
    
    
    public function index2(Project $project,$informal,$ontology){
        $nl_formula =DB::table('ontologies')->select('nl_formula')->get();
        return view('admin.ontology',['project' => $project] , compact('informal','ontology','nl_formula'));
    }




    public function generate_formal_specification(Request $request){
        try{
            $rules = [
                'projectid' => ['required'],
                'informal' => ['required', 'string'],
                'signification' => ['required', 'string'],
            ];
            $messages = [
                'projectid.required' => 'project required',
                'informal.required' => 'Informal specification field is required',
                'informal.string' => 'Informal specification must be an string',
                'signification.required' => 'signification field is required',
            ];        
    
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withError([$validator->errors()->first()]);
            }
            $test = Str::contains($request->informal,$request->signification);
            if(!$test){
                return redirect()->back()->withError(["The signification does not match the informal specification"]);
            }
            $project = $request->projectid;
            $informal = $request->informal;
            $ontology =DB::table('ontologies')->where('nl_formula',$request->signification)->first();
            return redirect(route('ontology_index2',[$project,$informal,$ontology->ctl_formula]))->withSuccess(['Formal specification generated successfuly                ']);

        }catch(\Exception $ex)
        {
            return redirect()->back()->withExp(['There is something wrong']);
        }
       

    }

    public function generate(Request $request){
        $project = Project::all();
        $informal = $request->input('informal');
        
        $converted2 = Str::contains($informal, 'is allways');
        if($converted2 ==true){
            $informal = $request->input('informal');
            $formal='AG';
            return view('admin.ontology',['informal' => $informal ,'formal' => $formal,'project' => $project ]);
            
        }

        $converted3 = Str::contains($informal, 'is for allways possible');
        if($converted3 ==true){
            $informal = $request->input('informal');
            $formal='AF';
            return view('admin.ontology', compact('formal','informal','project'));
          
        }

        $converted4 = Str::contains($informal, 'is possible');
        if($converted4 ==true){
            $informal = $request->input('informal');
            $formal='EF';
            return view('admin.ontology', compact('formal','informal','project'));
          
        }

        $converted5 = Str::contains($informal,  'is for the rest of the time possible');
        if($converted5 ==true){
            $informal = $request->input('informal');
            $formal='EG';
            
            return view('admin.ontology', compact('formal','informal','project'));
         
          
        }}


        public function storeontology(Request $request)
    {
        $property = new Property;
        $property->id_project = $request->get('id_project');
        $property->formula = $request->input('formal');
        $property->remark = $request->input('informal');
       
        $property->save();
        return redirect()->back()->with('status','property Added Successfully');
    }

    public function subprmtr(Request $request , Project $project ){
        $array = Array();
        $i=0;
        $formal= $request->input('formal');
        $informal= $request->input('informal');

        $for_p = Str::contains($formal, 'P');
        $for_q = Str::contains($formal, 'Q');
        $for_r = Str::contains($formal, 'R');
        $for_s = Str::contains($formal, 'S');
        $data = array(['parameter'=>'P','parameter'=>'Q','parameter'=>'R','parameter'=>'S']);

        if($for_p){
            $array[$i]='P';
            $i++;
        }

        if($for_q ){
            $array[$i]='Q';
            $i++;
        }

        if($for_r ){
            $array[$i]='R';
            $i++;
        }

        if($for_s ){
            $array[$i]='S';
            $i++;
        }


        $proposition = Proposition::select('auto_prop')->where('id_project',$project->id)->get();
        return view('admin.simpleprmtr',['project' => $project], compact('formal','proposition','informal','array'));
    }

    public function replace(Request $request, Project $project){
        
       
     $formal1= $request->input('formula');
     $prmtrP =  $request->input('P');
     $prmtrQ =  $request->input('Q');
     $prmtrR =  $request->input('R');
     $prmtrS =  $request->input('S');
     $formalp = Str::replace('P', $prmtrP, $formal1)  ;
     $formalq = Str::replace('Q', $prmtrQ, $formalp)  ;
      $formalr = Str::replace('R', $prmtrR, $formalq)  ;
      $formal = Str::replace('S', $prmtrS, $formalr)  ;  

     $informal= $request->input('postId');
     
     return view('admin.createprop_final',['project' => $project], compact('formal','informal'));
    }

      
}
