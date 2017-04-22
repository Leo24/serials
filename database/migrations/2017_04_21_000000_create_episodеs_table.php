<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodеSTable extends Migration
{
    /**
     * Run the migrations.
     * @table episodеs
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodеs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('serial_id')->nullable();
            $table->unsignedInteger('season_id')->nullable();
            $table->date('premiere_date')->nullable();
            $table->string('picture')->nullable();

            $table->index(["serial_id"], 'fk_episodеs_2_idx');

            $table->index(["season_id"], 'fk_episodеs_1_idx');
            $table->nullableTimestamps();


            $table->foreign('season_id', 'fk_episodеs_1_idx')
                ->references('id')->on('seasons')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('serial_id', 'fk_episodеs_2_idx')
                ->references('id')->on('serials')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodеs');
    }
}