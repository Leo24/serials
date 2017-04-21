<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     * @table serials
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('genre_id')->nullable();
            $table->string('picture')->nullable();
            $table->softDeletes();

            $table->index(["genre_id"], 'fk_genres_idx');

            $table->index(["country_id"], 'fk_countries_idx');
            $table->nullableTimestamps();


            $table->foreign('genre_id', 'fk_genres_idx')
                ->references('id')->on('genres')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('country_id', 'fk_countries_idx')
                ->references('id')->on('countries')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('serials');
     }
}
