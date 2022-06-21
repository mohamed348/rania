<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Project;
use App\Models\Proposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PropertyController extends Controller
{ 
    
    public $property;


    public function index()
    {
        $property = Property::all();
        $project = Project::all();
        return view( 'admin.properties' , compact('property','project'));
    }



    
    public function createprop(Project $project)
    {
       $formal = '';
       $informal='';
       
        return view('admin.createprop',['project'=>$project] , compact('formal','informal'));
    }
    public function storeproptwo(Request $request , Project $project)
    {
        $informal = $request->input('informal');
        $formal = $request->input('formal');
        $for_p = Str::contains($formal, 'P');
        $for_q = Str::contains($formal, 'Q');
        $for_r = Str::contains($formal, 'R');
        $for_s = Str::contains($formal, 'S');
        
       
        $property = new Property;
        $property->id_project = $request->get('projectid');
        $property->formula = $request->input('formal');
        $property->remark = $request->input('informal');
      
        $property->save();
       
        $groupTwo = Property::all();

        
        return view('admin.projectdetails',['project' => $project  ],compact( 'groupTwo'));
        
        
        
    }
    public function storeprop(Request $request , Project $project)
    {
        $rules = [
            'projectid' => ['required', 'integer'],
            'formula' => ['required', 'string'],
            'signification' => ['required', 'string'],
        ];
        $messages = [
            'projectid.required' => 'project required',
            'formula.required' => 'formula field is required',
            'formula.string' => 'formula must be an string',
            'signification.required' => 'signification field is required',
        ];        

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withError([$validator->errors()->first()]);
        }
        $test = Str::contains($request->formula,$request->signification);
        if(!$test){
            return back()->withError(["The signification does not match the formula"]);
        }


        $property = new Property;
        $property->id_project = $request->input('projectid');
        $property->formula = $request->input('formula');
        $property->remark = $request->input('remark');
       
        $property->save();
       
        return redirect()->back()->with(['property Added Successfully']);
        
    }


    public function store(Request $request)
    {
        $property = new Property;
        $property->id_project = $request->get('id_project');
        $property->formula = $request->input('formula');
        $property->remark = $request->input('remark');
       
        $property->save();
        return redirect()->back()->with('status','property Added Successfully');
    }

    public function edit(Property $property )
    {
        
       
        return view('admin.editproperty',['property' => $property ] );
    }

    public function update(Property $property ,Request $request )
    {
       
        $attributes = request()->validate([
        
        'formula' => 'required',
        'remark' => 'required',
        ]);
       
        $property->update($attributes);
      
        $project = Project::where('id', $property->id_project)->first();
        $groupTwo = Property::all();

        return view('admin.projectdetails',['project' => $project  ], compact('groupTwo')); 

        return view('admin.projects', compact('project'));

        $p =  $request->get('projectid');
        $project = Project::all()-> where('id','like','%' .$p. '%');
        $groupTwo = Property::all();
    
        return view('admin.projectdetails',['project' => $project  ], compact('groupTwo')); 

        return redirect()->back()->with('status','Property updated Successfully');
    }
   
    public function destroy(Property $property ,  Project $project){
    $property ->delete();
    $groupTwo = Property::all();
   
    return view('admin.projectdetails',['project' => $project  ], compact('groupTwo')); 
    }


    public function edit_sub(Property $property ,Request $request ){
       
            $array = Array();
            $i=0;
                $formal = $request->input('formula');
                $propertys = Property::all();
                $informal = $request->input('remark');
               
                $for_p = Str::contains($formal, 'P');
                $for_q = Str::contains($formal, 'Q');
                $for_r = Str::contains($formal, 'R');
                $for_s = Str::contains($formal, 'S');
        
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
        
         $proposition = Proposition::select('auto_prop')->where('id_project',$property->id_project)->get();
                return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
        
            }



            public function okprmtr_edit(Request $request ,  Property $property){
                $informal = $request->input('postId1');
                $result =$request->get('bool');
                $propertys = Property::all();
                $formal1 = $request->input('postId2');
                $prmtr =  $request->get('prmtr_pqrs');
               
               
                $proposition = Proposition::select('auto_prop')->where('id_project',$property->id_project)->get();
        
           
                
                if($result == 'choice'){
                if($prmtr == 'P'){
                   
                    $p_final = $request->input('simple');
                 
                    
                    $formal = Str::replace('P', $p_final, $formal1)  ;
                    $informal = Str::replace('P', $p_final, $informal)  ;
                    $for_p = Str::contains($formal, 'P');
                    $for_q = Str::contains($formal, 'Q');
                    $for_r = Str::contains($formal, 'R');
                    $for_s = Str::contains($formal, 'S');
                    $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                    $array = Array();
                    $i=0;
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
                    if($for_a ){
                        $array[$i]='a';
                        $i++;
                    }
                    if($for_b ){
                        $array[$i]='b';
                        $i++;
                    }
                    return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                }
                if( $prmtr == 'Q'){
                    
                        $q_final = $request->input('simple');
                        $formal = Str::replace('Q', $q_final, $formal1) ;
                        $informal = Str::replace('Q', $q_final, $informal)  ;
                       
                        $for_p = Str::contains($formal, 'P');
                        $for_q = Str::contains($formal, 'Q');
                        $for_r = Str::contains($formal, 'R');
                        $for_s = Str::contains($formal, 'S');
                        $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                        $array = Array();
                        $i=0;
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
                        if($for_a ){
                            $array[$i]='a';
                            $i++;
                        }
                        if($for_b ){
                            $array[$i]='b';
                            $i++;
                        }
                        return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                 }
        
                 if($prmtr == 'R'){
                   
                    $r_final =$request->input('simple');
                    $formal = Str::replace('R', $r_final, $formal1) ;
                    $informal = Str::replace('R', $r_final, $informal)  ;
                    $for_p = Str::contains($formal, 'P');
                    $for_q = Str::contains($formal, 'Q');
                    $for_r = Str::contains($formal, 'R');
                    $for_s = Str::contains($formal, 'S');
                    $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                    $array = Array();
                    $i=0;
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
                    if($for_a ){
                        $array[$i]='a';
                        $i++;
                    }
                    if($for_b ){
                        $array[$i]='b';
                        $i++;
                    }
        
                    return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                }
                if( $prmtr == 'S'){
                   
                    $s_final =$request->input('simple');
                
                    $formal = Str::replace('S', $s_final, $formal1) ;
                    $informal = Str::replace('S', $s_final, $informal)  ;
                    $for_p = Str::contains($formal, 'P');
                    $for_q = Str::contains($formal, 'Q');
                    $for_r = Str::contains($formal, 'R');
                    $for_s = Str::contains($formal, 'S');
                    $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                    $array = Array();
                    $i=0;
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
                    if($for_a ){
                        $array[$i]='a';
                        $i++;
                    }
                    if($for_b ){
                        $array[$i]='b';
                        $i++;
                    }
        
                    return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                 }
                 if($prmtr == 'a'){
                   
                    $a_final = $request->input('simple');
                 
                    $message ="its work";
                    $formal = Str::replace('a', $a_final, $formal1)  ;
                    $informal = Str::replace('a', $a_final, $informal)  ;
                    $for_p = Str::contains($formal, 'P');
                    $for_q = Str::contains($formal, 'Q');
                    $for_r = Str::contains($formal, 'R');
                    $for_s = Str::contains($formal, 'S');
                    $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                    $array = Array();
                    $i=0;
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
                    if($for_a ){
                        $array[$i]='a';
                        $i++;
                    }
                    if($for_b ){
                        $array[$i]='b';
                        $i++;
                    }
                    return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                }
            
                if($prmtr == 'b'){
                   
                    $b_final = $request->input('simple');
                 
                    $message ="its work";
                    $formal = Str::replace('b', $b_final, $formal1)  ;
                    $informal = Str::replace('b', $b_final, $informal)  ;
                    $for_p = Str::contains($formal, 'P');
                    $for_q = Str::contains($formal, 'Q');
                    $for_r = Str::contains($formal, 'R');
                    $for_s = Str::contains($formal, 'S');
                    $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                    $array = Array();
                    $i=0;
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
                    if($for_a ){
                        $array[$i]='a';
                        $i++;
                    }
                    if($for_b ){
                        $array[$i]='b';
                        $i++;
                    }
                    return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                }}
                 if($result == 'two'){
                    if($prmtr == 'P'){
                      
                        $p_final = $request->input('baliz');
                       
                        $formal = Str::replace('P', $p_final, $formal1) ;
                        $informal = Str::replace('P', $p_final, $informal)  ;
                        $for_p = Str::contains($formal, 'P');
                        $for_q = Str::contains($formal, 'Q');
                        $for_r = Str::contains($formal, 'R');
                        $for_s = Str::contains($formal, 'S');
                        $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                        $array = Array();
                        $i=0;
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
                        if($for_a ){
                            $array[$i]='a';
                            $i++;
                        }
                        if($for_b ){
                            $array[$i]='b';
                            $i++;
                        }
                        return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                    }
                    if( $prmtr == 'Q'){
                        
                            $q_final = $request->input('baliz');
                           
                            $formal = Str::replace('Q', $q_final, $formal1) ;
                            $informal = Str::replace('Q', $q_final, $informal)  ;
                            $for_p = Str::contains($formal, 'P');
                            $for_q = Str::contains($formal, 'Q');
                            $for_r = Str::contains($formal, 'R');
                            $for_s = Str::contains($formal, 'S');
                            $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
        
                            $array = Array();
                            $i=0;
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
                            if($for_a ){
                                $array[$i]='a';
                                $i++;
                            }
                            if($for_b ){
                                $array[$i]='b';
                                $i++;
                            }
                            return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                     }
            
                     if($prmtr == 'R'){
                    
                        $r_final =$request->input('baliz');
                        $formal = Str::replace('R', $r_final, $formal1) ;
                        $informal = Str::replace('R', $r_final, $informal)  ;
                        $for_p = Str::contains($formal, 'P');
                        $for_q = Str::contains($formal, 'Q');
                        $for_r = Str::contains($formal, 'R');
                        $for_s = Str::contains($formal, 'S');
                        $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
        
                        $array = Array();
                        $i=0;
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
                        if($for_a ){
                            $array[$i]='a';
                            $i++;
                        }
                        if($for_b ){
                            $array[$i]='b';
                            $i++;
                        }
        
                        return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                    }
                    if( $prmtr == 'S'){
                       
                        $s_final =$request->input('baliz');
                        
                        $formal = Str::replace('S', $s_final, $formal1) ;
                        $informal = Str::replace('S', $s_final, $informal)  ;
                        $for_p = Str::contains($formal, 'P');
                        $for_q = Str::contains($formal, 'Q');
                        $for_r = Str::contains($formal, 'R');
                        $for_s = Str::contains($formal, 'S');
                        $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
        
                        $array = Array();
                        $i=0;
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
                        if($for_a ){
                            $array[$i]='a';
                            $i++;
                        }
                        if($for_b ){
                            $array[$i]='b';
                            $i++;
                        }
        
                        return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                     }
                     if($prmtr == 'a'){
                      
                        $a_final = $request->input('baliz');
                       
                        $formal = Str::replace('a', $a_final, $formal1) ;
                        $informal = Str::replace('a', $a_final, $informal)  ;
                        $for_p = Str::contains($formal, 'P');
                        $for_q = Str::contains($formal, 'Q');
                        $for_r = Str::contains($formal, 'R');
                        $for_s = Str::contains($formal, 'S');
                        $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                        $array = Array();
                        $i=0;
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
                        if($for_a ){
                            $array[$i]='a';
                            $i++;
                        }
                        if($for_b ){
                            $array[$i]='b';
                            $i++;
                        }
                        return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                    }
                    if($prmtr == 'b'){
                      
                        $b_final = $request->input('baliz');
                       
                        $formal = Str::replace('b', $b_final, $formal1) ;
                        $informal = Str::replace('b', $b_final, $informal)  ;
                        $for_p = Str::contains($formal, 'P');
                        $for_q = Str::contains($formal, 'Q');
                        $for_r = Str::contains($formal, 'R');
                        $for_s = Str::contains($formal, 'S');
                        $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                        $array = Array();
                        $i=0;
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
                        if($for_a ){
                            $array[$i]='a';
                            $i++;
                        }
                        if($for_b ){
                            $array[$i]='b';
                            $i++;
                        }
                        return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                    }}
        
        
                     if($result == 'three'){
                        if($prmtr == 'P'){
                           
                            $p_final = $request->get('id_prop');
                            
                            $formal = Str::replace('P', $p_final, $formal1) ;
                            $informal = Str::replace('P', $p_final, $informal)  ;
                            $for_p = Str::contains($formal, 'P');
                            $for_q = Str::contains($formal, 'Q');
                            $for_r = Str::contains($formal, 'R');
                            $for_s = Str::contains($formal, 'S');
                            $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                            $array = Array();
                            $i=0;
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
                            if($for_a ){
                                $array[$i]='a';
                                $i++;
                            }
                            if($for_b ){
                                $array[$i]='b';
                                $i++;
                            }
            
                            return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                        }
                        if( $prmtr == 'Q'){
                            
                                $q_final = $request->get('id_prop');
                               
                                $formal = Str::replace('Q', $q_final, $formal1) ;
                                $informal = Str::replace('Q', $q_final, $informal)  ;
                                $for_p = Str::contains($formal, 'P');
                                $for_q = Str::contains($formal, 'Q');
                                $for_r = Str::contains($formal, 'R');
                                $for_s = Str::contains($formal, 'S');
                                $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                                $array = Array();
                                $i=0;
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
                                if($for_a ){
                                    $array[$i]='a';
                                    $i++;
                                }
                                if($for_b ){
                                    $array[$i]='b';
                                    $i++;
                                }
                
                                return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                         }
                
                         if($prmtr == 'R'){
                           
                            $r_final =$request->get('id_prop');
                            $formal = Str::replace('R', $r_final, $formal1) ;
                            $informal = Str::replace('R', $r_final, $informal)  ;
                            $for_p = Str::contains($formal, 'P');
                            $for_q = Str::contains($formal, 'Q');
                            $for_r = Str::contains($formal, 'R');
                            $for_s = Str::contains($formal, 'S');
                            $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                            $array = Array();
                            $i=0;
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
                            if($for_a ){
                                $array[$i]='a';
                                $i++;
                            }
                            if($for_b ){
                                $array[$i]='b';
                                $i++;
                            }
            
                            return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                        }
                        if( $prmtr == 'S'){
                         
                            $s_final =$request->get('id_prop');
                          
                            $formal = Str::replace('S', $s_final, $formal1) ;
                            $informal = Str::replace('S', $s_final, $informal)  ;
                            $for_p = Str::contains($formal, 'P');
                            $for_q = Str::contains($formal, 'Q');
                            $for_r = Str::contains($formal, 'R');
                            $for_s = Str::contains($formal, 'S');
                            $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                            $array = Array();
                            $i=0;
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
                            if($for_a ){
                                $array[$i]='a';
                                $i++;
                            }
                            if($for_b ){
                                $array[$i]='b';
                                $i++;
                            }
                            return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                         }
                         if($prmtr == 'a'){
                           
                            $a_final = $request->get('id_prop');
                            
                            $formal = Str::replace('a', $a_final, $formal1) ;
                            $informal = Str::replace('a', $a_final, $informal)  ;
                            $for_p = Str::contains($formal, 'P');
                            $for_q = Str::contains($formal, 'Q');
                            $for_r = Str::contains($formal, 'R');
                            $for_s = Str::contains($formal, 'S');
                            $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                            $array = Array();
                            $i=0;
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
                            if($for_a ){
                                $array[$i]='a';
                                $i++;
                            }
                            if($for_b ){
                                $array[$i]='b';
                                $i++;
                            }
            
                            return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                        }
                        if($prmtr == 'b'){
                           
                            $b_final = $request->get('id_prop');
                            
                            $formal = Str::replace('b', $b_final, $formal1) ;
                            $informal = Str::replace('b', $b_final, $informal)  ;
                            $for_p = Str::contains($formal, 'P');
                            $for_q = Str::contains($formal, 'Q');
                            $for_r = Str::contains($formal, 'R');
                            $for_s = Str::contains($formal, 'S');
                            $for_a = Str::contains($formal, 'a');
                        $for_b = Str::contains($formal, 'b');
                            $array = Array();
                            $i=0;
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
                            if($for_a ){
                                $array[$i]='a';
                                $i++;
                            }
                            if($for_b ){
                                $array[$i]='b';
                                $i++;
                            }
            
                            return view('admin.prmtrsub_edit',['property' => $property ], compact('formal','informal','proposition','propertys','array'));
                        }}
                         
            }
    

            public function oksub_edit(Request $request ,  Property $property){


                
                
         
                    $informal=$request->input('postId1');
                     $formal= $request->input('postId2');
                     
                    
                 return view('admin.editprop_final',['property' => $property], compact('formal','informal'));
                 
         
                 
         }
           
        
    

   

    

    

}
