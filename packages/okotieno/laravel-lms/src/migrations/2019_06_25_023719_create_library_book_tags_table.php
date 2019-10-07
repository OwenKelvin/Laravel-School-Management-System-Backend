<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryBookTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_book_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->boolean('active')->default(true);
            //$table->timestamps();
        });

        Schema::create('library_book_library_book_tag', function (Blueprint $table) {
            $table->integer('library_book_id');
            $table->integer('library_book_tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_book_library_book_tag');
        Schema::dropIfExists('library_book_tags');
    }
}
