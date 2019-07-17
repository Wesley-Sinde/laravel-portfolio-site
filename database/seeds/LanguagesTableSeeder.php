<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert(['name'=>'HTML5']);
        DB::table('languages')->insert(['name'=>'CSS']);
        DB::table('languages')->insert(['name'=>'SASS']);
        DB::table('languages')->insert(['name'=>'JavaScript/ES6']);
        DB::table('languages')->insert(['name'=>'PHP']);
        DB::table('languages')->insert(['name'=>'C#']);
        DB::table('languages')->insert(['name'=>'Python']);
        DB::table('languages')->insert(['name'=>'Ruby']);
        DB::table('languages')->insert(['name'=>'Java']);
        DB::table('languages')->insert(['name'=>'Go']);
        DB::table('languages')->insert(['name'=>'TypeScript']);
        DB::table('languages')->insert(['name'=>'WebAssembly']);

    }
}
