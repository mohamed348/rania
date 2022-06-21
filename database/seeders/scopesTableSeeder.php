<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class scopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scopes')->insert(array(
            array(
    'name' => "global",
    'discription' => 'p is true globally',
    ),
    array(
    'name' => "before",
    'discription' => 'p is true before r',
    ),
    array(
    'name' => "after",
    'discription' => 'p is true after q',
    ),
    array(
    'name' => "between",
    'discription' => 'p is true between q and r',
    ),
    array(
    'name' => "after_until",
    'discription' => 'p is true after q until r',
    )
    ));
    }
}
