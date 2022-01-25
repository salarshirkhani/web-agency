<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->string('year', 191);
            $table->string('link', 191);
            $table->string('trailer', 191);
            $table->string('duaration', 191);
            $table->boolean('downloadable')->nullable();
            $table->boolean('featured')->nullable();
            $table->text('description')->nullable();
            $table->string('image', 191);
            $table->string('stars', 191);
            $table->text('iframe')->nullable();
            $table->string('status', 191)->nullable();
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
        Schema::dropIfExists('movies');
    }
}
