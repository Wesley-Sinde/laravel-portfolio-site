<?php

use Illuminate\Database\Seeder;

class FrameworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frameworks')->insert(['name'=>'Laravel']);
        DB::table('frameworks')->insert(['name'=>'Symfony']);
        DB::table('frameworks')->insert(['name'=>'CodeIgniter']);
        DB::table('frameworks')->insert(['name'=>'Wordpress']);
        DB::table('frameworks')->insert(['name'=>'Angular']);
        DB::table('frameworks')->insert(['name'=>'Ruby On Rails']);
        DB::table('frameworks')->insert(['name'=>'Django']);
        DB::table('frameworks')->insert(['name'=>'ASP.NET']);
        DB::table('frameworks')->insert(['name'=>'Zend']);
        DB::table('frameworks')->insert(['name'=>'Express.js']);
        DB::table('frameworks')->insert(['name'=>'Ember.js']);
        DB::table('frameworks')->insert(['name'=>'Vue.Js']);
        DB::table('frameworks')->insert(['name'=>'Spring']);
        DB::table('frameworks')->insert(['name'=>'Flask']);
    }
}
