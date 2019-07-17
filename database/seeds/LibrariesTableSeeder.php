<?php

use Illuminate\Database\Seeder;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libraries')->insert(['name'=>'jQuery']);
        DB::table('libraries')->insert(['name'=>'Bootstrap']);
        DB::table('libraries')->insert(['name'=>'React']);
        DB::table('libraries')->insert(['name'=>'Redux']);
        DB::table('libraries')->insert(['name'=>'Express']);
    }
}
