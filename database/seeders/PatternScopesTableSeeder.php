<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PatternScopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_scopes')->insert(array(
            array(
                'pattern_id' => "7",
                'scope_id' => '1',
                'formula' => "AF(P)",
                'nl_formula' => 'P becomes true Globally',
                ),
                array(
                    'pattern_id' => "7",
                    'scope_id' => '2',
                    'formula' => "A[!R W (P & !R)]",
                    'nl_formula' => 'P becomes true Before R ',
               
                ),
                array(
                    'pattern_id' => "7",
                    'scope_id' => '3',
                    'formula' => "A[!Q W (Q & AF(P))]",
                    'nl_formula' => 'P becomes true After Q',
                   
                    ),
                    array(
                        'pattern_id' => "7",
                        'scope_id' => '4',
                        'formula' => "AG(Q & !R -> A[!R W (P & !R)])",
                        'nl_formula' => 'P becomes true Between Q and R',
                    ),
                    array(
                        'pattern_id' => "7",
                'scope_id' => '5',
                'formula' => "AG(Q & !R -> A[!R U (P & !R)])
                ",
                'nl_formula' => 'P becomes true After Q until R',
                       
                        ),





                        array(
                            'pattern_id' => "5",
                            'scope_id' => '1',
                            'formula' => "AG(!P)",
                            'nl_formula' => 'P is false Globally',
                       
                        ),
            array(
                'pattern_id' => "5",
                'scope_id' => '2',
                'formula' => "A[(!P | AG(!R)) W R]",
                'nl_formula' => 'P is false Before R',
           
            ),
            array(
                'pattern_id' => "5",
                'scope_id' => '3',
                'formula' => "AG(Q -> AG(!P))",
                'nl_formula' => 'P is false After Q',
           
            ),
            array(
                'pattern_id' => "5",
                'scope_id' => '4',
                'formula' => "AG(Q & !R -> A[(!P | AG(!R)) W R])",
                'nl_formula' => 'P is false Between Q and R',
           
            ),
array(
    'pattern_id' => "5",
    'scope_id' => '5',
    'formula' => "AG(Q & !R -> A[!P W R])",
    'nl_formula' => 'P is false After Q until R',

),







array(
    'pattern_id' => "8",
    'scope_id' => '1',
    'formula' => "!EF(!P & EX(P & EF(!P & EX(P & EF(!P & EX(P))))))",
    'nl_formula' => 'Transitions to P-states occur at most 2 times Globally',

),
array(
    'pattern_id' => "8",
    'scope_id' => '2',
    'formula' => "!E[!R U (!P & !R & EX(P &
    E[!R U (!P & !R & EX(P &
       E[!R U (!P & !R & EX(P & !R))]))]))]",
    'nl_formula' => 'Transitions to P-states occur at most 2 times Before R',

),
array(
'pattern_id' => "8",
'scope_id' => '3',
'formula' => "!E[!Q U (Q & EF(!P & EX(P & EF(!P & EX(P & EF(!P & EX(P)))))))]",
'nl_formula' => 'Transitions to P-states occur at most 2 times After Q',

),
array(
'pattern_id' => "8",
'scope_id' => '4',
'formula' => "AG(Q -> !E[!R U (!P & !R & EX(P &
E[!R U (!P & !R & EX(P &
   E[!R U (!P & !R & EX(P & !R & EF(R)))]))]))])",
'nl_formula' => 'Transitions to P-states occur at most 2 times Between Q and R',

),
array(
    'pattern_id' => "8",
    'scope_id' => '5',
    'formula' => "AG(Q -> !E[!R U (!P & !R & EX(P &
    E[!R U (!P & !R & EX(P &
       E[!R U (!P & !R & EX(P & !R))]))]))])",
    'nl_formula' => 'Transitions to P-states occur at most 2 times After Q until R',

),





array(
'pattern_id' => "6",
'scope_id' => '1',
'formula' => "AG(P)",
'nl_formula' => 'P is true Globally',

),
array(
'pattern_id' => "6",
'scope_id' => '2',
'formula' => "A[(P | AG(!R)) W R]",
'nl_formula' => 'P is true Before R',

),
array(
    'pattern_id' => "6",
    'scope_id' => '3',
    'formula' => "AG(Q -> AG(P))",
    'nl_formula' => 'P is true After Q',

),
array(
    'pattern_id' => "6",
    'scope_id' => '4',
    'formula' => "AG(Q & !R -> A[(P | AG(!R)) W R])",
    'nl_formula' => 'P is true Between Q and R	',

),
array(
'pattern_id' => "6",
'scope_id' => '5',
'formula' => "AG(Q & !R -> A[P W R])",
'nl_formula' => 'P is true After Q until R	',

),







array(
'pattern_id' => "1",
'scope_id' => '1',
'formula' => "A[!P W S]",
'nl_formula' => 'S precedes P Globally',

),
array(
    'pattern_id' => "1",
    'scope_id' => '2',
    'formula' => "A[(!P | AG(!R)) W (S | R)]",
    'nl_formula' => 'S precedes P Before R',

),
array(
    'pattern_id' => "1",
    'scope_id' => '3',
    'formula' => "A[!Q W (Q & A[!P W S])]",
    'nl_formula' => 'S precedes P After Q',

),
array(
    'pattern_id' => "1",
    'scope_id' => '4',
    'formula' => "AG(Q & !R -> A[(!P | AG(!R)) W (S | R)])",
    'nl_formula' => 'S precedes P Between Q and R',

),
array(
'pattern_id' => "1",
'scope_id' => '5',
'formula' => "AG(Q & !R -> A[!P W (S | R)])",
'nl_formula' => 'S precedes P After Q until R',

),





array(
'pattern_id' => "2",
'scope_id' => '1',
'formula' => "AG(P -> AF(S))",
'nl_formula' => 'S responds to P Globally',

),
array(
    'pattern_id' => "2",
    'scope_id' => '2',
    'formula' => "A[((P -> A[!R U (S & !R)]) | AG(!R)) W R]",
    'nl_formula' => 'S responds to P Before R',

),
array(
    'pattern_id' => "2",
    'scope_id' => '3',
    'formula' => "A[!Q W (Q & AG(P -> AF(S))] ",
    'nl_formula' => 'S responds to P After Q',
    
    ),
    array(
        'pattern_id' => "2",
        'scope_id' => '4',
        'formula' => "AG(Q & !R -> A[((P -> A[!R U (S & !R)]) | AG(!R)) W R])",
        'nl_formula' => 'S responds to P Between Q and R',
    
    ),
    array(
        'pattern_id' => "2",
        'scope_id' => '5',
        'formula' => "AG(Q & !R -> A[(P -> A[!R U (S & !R)]) W R])",
        'nl_formula' => 'S responds to P After Q until R',
    
    ),






    array(
        'pattern_id' => "3",
        'scope_id' => '1',
        'formula' => "!E[!P U (S & !P & EX(EF(T)))]",
        'nl_formula' => 'P precedes S,T Globally',
    
    ),
    array(
    'pattern_id' => "3",
    'scope_id' => '2',
    'formula' => "!E[(!P & !R) U (S & !P & !R & EX(E[!R U (T & !R)]))]",
    'nl_formula' => 'P precedes S,T Before R',
    
    ),
    array(
        'pattern_id' => "3",
        'scope_id' => '3',
        'formula' => "!E[!Q U (Q & E[!P U (S & !P & EX(EF(T)))])]",
        'nl_formula' => 'P precedes S,T After Q',
    
    ),
    array(
        'pattern_id' => "3",
        'scope_id' => '4',
        'formula' => "AG(Q -> !E[(!P & !R) U (S & !P & !R & 
        EX(E[!R U (T & !R & EF(R))]))])",
        'nl_formula' => 'P precedes S,T Between Q and R',
        
        ),
        array(
            'pattern_id' => "3",
            'scope_id' => '5',
            'formula' => "AG(Q -> !E[(!P & !R) U (S & !P & !R & 
            EX(E[!R U (T & !R)]))])",
            'nl_formula' => 'P precedes S,T After Q until R',
        
        ),





        array(
            'pattern_id' => "4",
            'scope_id' => '1',
            'formula' => "AG(P -> AF(S & AX(AF(T))))" ,
            'nl_formula' => 'S,T responds to P Globally',
        
        ),
        array(
            'pattern_id' => "4",
            'scope_id' => '2',
            'formula' => "!E[!R U (P & !R & (E[!S U R] | 
            E[!R U (S & !R & EX(E[!T U R]))]))]",
            'nl_formula' => 'S,T responds to P Before R',
        
        ),
        array(
        'pattern_id' => "4",
        'scope_id' => '3',
        'formula' => "!E[!Q U (Q & EF(P & (EG(!S) | EF(S & EX(EG(!T))))))]",
        'nl_formula' => 'S,T responds to P After Q',
        
        ),
        array(
            'pattern_id' => "4",
            'scope_id' => '4',
            'formula' => "AG(Q -> !E[!R U (P & !R & 
            (E[!S U R] | 
             E[!R U (S & !R & EX(E[!T U R]))]))])",
            'nl_formula' => 'S,T responds to P Between Q and R',
        
        ),
        array(
        'pattern_id' => "4",
        'scope_id' => '5',
        'formula' => "AG(Q -> !E[!R U (P & !R & 
        (E[!S U R] | EG(!S & !R) |
         E[!R U (S & !R & 
                 EX(E[!T U R] | EG(!T & !R)))]))])",
        'nl_formula' => 'S,T responds to P After Q until R',
        
        )


            ));
    }
}
