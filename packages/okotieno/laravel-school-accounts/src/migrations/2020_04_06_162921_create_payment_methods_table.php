<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('active')->default(true);
            $table->softDeletes();
        });
        DB::table('payment_methods')->insert([
            ['name' => 'Cash'],
            ['name' => 'Direct Bank Deposit'],
            ['name' => 'Bank Transfer'],
            ['name' => 'Personal Cheque'],
            ['name' => 'Bankers Cheque'],
            ['name' => 'Bursary'],
            ['name' => 'Scholarship'],
            ['name' => 'In Kind'],
            ['name' => 'Mobile Money Transfer']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
