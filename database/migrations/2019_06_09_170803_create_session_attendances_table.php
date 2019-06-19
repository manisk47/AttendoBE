<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_Attendances', function (Blueprint $table) {
            $table->boolean('attended')->default(0);
            $table->bigInteger('sessionID')->unsigned()->index();
            $table->bigInteger('studentID')->unsigned()->index();
            $table->foreign('sessionID')->references('id')->on('Sessions')->onDelete('cascade');
            $table->foreign('studentID')->references('id')->on('Students')->onDelete('cascade');
            $table->primary(['sessionID', 'studentID']);
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
        Schema::dropIfExists('session_Attendances');
    }
}
