<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('databases')->insert(['name'=>'Mysql']);
        DB::table('databases')->insert(['name'=>'MariaDB']);
        DB::table('databases')->insert(['name'=>'Postgres']);
        DB::table('databases')->insert(['name'=>'SQLLite']);
        DB::table('databases')->insert(['name'=>'MS SQL Server']);
        DB::table('databases')->insert(['name'=>'Oracle']);
        DB::table('databases')->insert(['name'=>'MongoDB']);

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

        DB::table('libraries')->insert(['name'=>'jQuery']);
        DB::table('libraries')->insert(['name'=>'Bootstrap']);
        DB::table('libraries')->insert(['name'=>'React']);
        DB::table('libraries')->insert(['name'=>'Redux']);
        DB::table('libraries')->insert(['name'=>'Express']);

        DB::table('skills')->insert(['name'=>'Problem-solving']);
        DB::table('skills')->insert(['name'=>'git']);
        DB::table('skills')->insert(['name'=>'Bash']);
        DB::table('skills')->insert(['name'=>'Docker']);
        DB::table('skills')->insert(['name'=>'Linux']);
    }
}
