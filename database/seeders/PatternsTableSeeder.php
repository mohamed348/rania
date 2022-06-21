<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PatternsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patterns')->insert(array(
            array(
                'name' => "precedence",
                'discription' => 'p must allways preceded by q',
               
                ),
                array(
                'name' => "response",
                'discription' => 'p must allways followed by q ',
               
                ),
                array(
                    'name' => "precedence_chains",
                    'discription' => 'chain p must allways preceded by q',
                   
                    ),
                    array(
                    'name' => "response_chains",
                    'discription' => 'chain p must allways followed by q ',
                   
                    ),
                    array(
                        'name' => "absence",
                        'discription' => 'never occur',
                       
                        ),
                        array(
                        'name' => "universality",
                        'discription' => 'globally occur ',
                       
                        ),
            array(
            'name' => "existence",
            'discription' => 'must occur',
           
            ),
            array(
            'name' => "bounded_existence",
            'discription' => 'must appear k times ',
           
            )
            ));
    }
}
