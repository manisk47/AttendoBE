<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_Teachers', function (Blueprint $table) {

            $table->bigInteger('courseID')->unsigned()->index();
            $table->bigInteger('teacherID')->unsigned()->index();
            $table->foreign('courseID')->references('id')->on('Courses')->onDelete('cascade');
            $table->foreign('teacherID')->references('id')->on('teachers')->onDelete('cascade');
            $table->primary(['courseID', 'teacherID']);
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
        Schema::dropIfExists('course_Teachers');
    }
}
