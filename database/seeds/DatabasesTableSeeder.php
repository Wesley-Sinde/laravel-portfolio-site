<?php

use Illuminate\Database\Seeder;

class DatabasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

    }
}
