<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTableLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_table_lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->integer('teacher_id');
            $table->integer('time_table_id');
            $table->integer('week_day_id');
            $table->integer('room_id');
            $table->integer('stream_id');
            $table->integer('time_table_timing_id');
            $table->integer('unit_id');
            $table->integer('class_level_id');
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
        Schema::dropIfExists('time_table_lessons');
    }
}
