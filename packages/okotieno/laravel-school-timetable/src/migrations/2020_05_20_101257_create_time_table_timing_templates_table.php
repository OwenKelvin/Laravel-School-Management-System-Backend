<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTableTimingTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_table_timings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('start');
            $table->time('end');
            $table->timestamps();
        });
        Schema::create('time_table_timing_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('time_table_timing_time_table_timing_template', function (Blueprint $table) {
            $table->integer('time_table_timing_id');
            $table->integer('time_table_timing_template_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_table_timings');
        Schema::dropIfExists('time_table_timing_templates');
        Schema::dropIfExists('time_table_timing_time_table_timing_template');
    }
}
