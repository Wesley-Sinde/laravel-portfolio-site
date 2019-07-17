<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert(['name'=>'Problem-solving']);
        DB::table('skills')->insert(['name'=>'git']);
        DB::table('skills')->insert(['name'=>'Bash']);
        DB::table('skills')->insert(['name'=>'Docker']);
        DB::table('skills')->insert(['name'=>'Linux']);
    }
}
