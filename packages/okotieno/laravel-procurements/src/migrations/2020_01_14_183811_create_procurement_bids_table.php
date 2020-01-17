<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcurementBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement_bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tender_id');
            $table->integer('vendor_id');
            $table->string('unit_description');
            $table->string('description')->nullable();
            $table->double('price_per_unit');
            $table->boolean('awarded')->nullable();
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
        Schema::dropIfExists('procurement_bids');
    }
}
