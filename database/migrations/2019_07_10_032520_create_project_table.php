<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 50);
            $table->text('info');
            $table->string('url',255);
            $table->string('github_url',255);
            $table->string('image');
            $table->text('languages');
            $table->text('frameworks')->nullable();
            $table->text('databases')->nullable();
            $table->text('libraries')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('projects');
    }
}
