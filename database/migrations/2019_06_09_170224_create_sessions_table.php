<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('week');
            $table->dateTime('sessionTime');
            $table->bigInteger('courseId')->unsigned()->nullable();
            $table->bigInteger('teacherId')->unsigned()->nullable();
            $table->foreign('courseID')->references('id')->on('Courses')->onDelete('set null');
            $table->foreign('teacherID')->references('id')->on('teachers')->onDelete('set null');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
