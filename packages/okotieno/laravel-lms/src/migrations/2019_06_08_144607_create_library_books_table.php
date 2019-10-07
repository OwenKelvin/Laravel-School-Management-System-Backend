<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('ISBN');
            $table->string('publication_date')->nullable();
            $table->integer('volume')->nullable();
            $table->double('max_borrowing_days')->default(14);
            $table->double('max_borrowing_hours')->default(6);
            $table->double('overdue_charge_per_hour')->default(6);
            $table->integer('minimum_reserve')->default(0);
            $table->timestamps();
        });

        Schema::create('library_book_library_book_author', function (Blueprint $table) {
            $table->integer('library_book_author_id');
            $table->integer('library_book_id');
        });

        Schema::create('library_book_library_book_publisher', function (Blueprint $table) {
            $table->integer('library_book_publisher_id');
            $table->integer('library_book_id');
        });

        Schema::create('library_book_library_class', function (Blueprint $table) {
            $table->integer('library_class_id');
            $table->integer('library_book_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_books');
        Schema::dropIfExists('library_book_library_book_author');
        Schema::dropIfExists('library_book_library_book_publisher');
        Schema::dropIfExists('library_book_library_class');
    }
}
