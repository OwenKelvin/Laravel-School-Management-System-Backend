<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialCostItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_cost_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('financial_cost_id');
            $table->boolean('active')->default(true);
            $table->string('name');
            $table->softDeletes();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_cost_items');
    }
}
