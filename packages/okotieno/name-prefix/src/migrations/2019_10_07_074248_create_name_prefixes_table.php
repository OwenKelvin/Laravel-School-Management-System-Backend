<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNamePrefixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_prefixes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('prefix');
            $table->boolean('active')->default(true);
        });

        DB::table('name_prefixes')->insert(
            [
                ['name' => 'Attorney', 'prefix' => 'Atty'],
                ['name' => 'Brother', 'prefix' => 'Bro'],
                ['name' => 'Chief', 'prefix' => 'Chief'],
                ['name' => 'Doctor', 'prefix' => 'Dr'],
                ['name' => 'Elder', 'prefix' => 'Elder'],
                ['name' => 'Father', 'prefix' => 'Fr'],
                ['name' => 'Mister', 'prefix' => 'Mr'],
                ['name' => 'Mrs', 'prefix' => 'Mrs'],
                ['name' => 'Miss', 'prefix' => 'Ms'],
                ['name' => 'Professor', 'prefix' => 'Prof'],
                ['name' => 'Rabbi', 'prefix' => 'Rabbi'],
                ['name' => 'Reverent', 'prefix' => 'Rev'],
                ['name' => 'Sister', 'prefix' => 'Sister'],
            ]
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('name_prefixes');
    }
}
