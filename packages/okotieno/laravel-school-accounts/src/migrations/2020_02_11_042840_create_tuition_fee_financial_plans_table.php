<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuitionFeeFinancialPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_fee_financial_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount')->default(0);
            $table->integer('class_level_id');
            $table->integer('unit_level_id');
            $table->integer('semester_id');
            $table->integer('academic_year_id');
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
        Schema::dropIfExists('tuition_fee_financial_plans');
    }
}
