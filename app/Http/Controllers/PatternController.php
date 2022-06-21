<?php

namespace App\Http\Controllers;
use App\Models\Scope;
use App\Models\Project;
use App\Models\Pattern;
use App\Models\Proposition;
use App\Models\Property;
use App\Models\PatternScope;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatternController extends Controller
{
   public $data = array();
    public function index(Project $project){
        $formal='';
        $informal=' ';
        $select_scope= '';
        $result = 'order_class';
        $select_pattern='';
        return view('admin.pattern',['project' => $project ], compact('select_pattern','formal','informal','select_scope','result'));
    }
  


    public function retreive(Request $request , Project $project){

      $select_scope =  $request->get('scope');
      $scope = Scope::select('id')
      ->where ('name', '=',  $select_scope)
      ->first();

      $result =$request->get('choice');
      if ( $result == 'order_class'){
      $select_pattern =  $request->get('order');
      }else{
        $select_pattern =  $request->get('occurrence');
      }

       

        $pattern = Pattern::select('id')
        ->where ('name', '=', $select_pattern)
        ->first();

        
        $work = PatternScope::select('formula','nl_formula')
        ->where ('pattern_id', '=', $pattern->id ) 
        ->where ('scope_id', '=', $scope->id  ) 
        ->first();
        $formal = $work->formula  ;
        $informal =$work->nl_formula ;
       $scope =  $request->get('scope');
       $order = $request->get('order') ;
       $occurrence = $request->get('occurrence');
        return view('admin.pattern',['project' => $project ],  compact('formal','informal','select_scope','result','select_pattern'));

    }




    public function parameter(Request $request, Project $project){
    $array = Array();
    $i=0;
        $informal = $request->input('informal');
        $property = Property::all();
        $formal = $request->input('formal');
       
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

 $proposition = Proposition::select('auto_prop')->where('id_project',$project->id)->get();
        return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));

    }

   
    
   
    public function oksub(Request $request ,  Project $project){


       $test = 1;
       

           $informal=$request->input('postId1');
            $formal= $request->input('postId2');
            
           
        return view('admin.createprop_final',['project' => $project], compact('formal','informal','test'));
        

        
}



public function okprmtr(Request $request ,  Project $project){
    $informal = $request->input('postId1');
    $result =$request->get('bool');
    $property = Property::all();
    $formal1 = $request->input('postId2');
    $prmtr =  $request->get('prmtr_pqrs');
   
   
    $proposition = Proposition::select('auto_prop')->where('id_project',$project->id)->get();


    
    if($result == 'choice'){
    if($prmtr == 'P'){
       
        $p_final = $request->input('simple');
     
        $message ="its work";
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
                return view('admin.prmtrsub',['project' => $project ], compact('message','formal','informal','proposition','property','array'));
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
         return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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

        return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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

         return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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
                return view('admin.prmtrsub',['project' => $project ], compact('message','formal','informal','proposition','property','array'));
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
                return view('admin.prmtrsub',['project' => $project ], compact('message','formal','informal','proposition','property','array'));
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
            return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
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
             return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property'));
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

            return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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

             return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
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
            return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
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
            return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
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

                return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
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
    
                 return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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

                return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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
                 return view('admin.prmtrsub',['project' => $project ], compact('formal','informal','proposition','property','array'));
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

                return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
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

                return view('admin.prmtrsub',['project' => $project ], compact('formal','proposition','informal','property','array'));
            }}
             
        }
    }