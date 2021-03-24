<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicYearUnitAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_year_unit_allocations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_level_id')->unsigned();
            $table->integer('academic_year_id')->unsigned();
            $table->integer('class_level_id')->unsigned();
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
        Schema::dropIfExists('academic_year_unit_allocations');
    }
}
