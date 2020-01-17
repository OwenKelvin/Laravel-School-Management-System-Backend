<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcurementFulfillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement_fulfills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('procurement_tender_id');
            $table->integer('entered_by');
            $table->boolean('fulfilled')->default(true);
            $table->string('comment');
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
        Schema::dropIfExists('procurement_fulfills');
    }
}
