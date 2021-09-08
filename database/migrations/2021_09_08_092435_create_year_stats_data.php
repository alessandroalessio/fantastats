<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearStatsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_stats_data', function (Blueprint $table) {
            $table->id();
            $table->integer('fid');
            $table->string('role');
            $table->string('name');
            $table->string('team');
            $table->integer('pg');
            $table->float('mv');
            $table->float('mf');
            $table->integer('gf');
            $table->integer('gs');
            $table->integer('rp');
            $table->integer('rc');
            $table->integer('r+');
            $table->integer('r-');
            $table->integer('ass');
            $table->integer('amm');
            $table->integer('esp');
            $table->integer('au');
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
        Schema::dropIfExists('year_stats_data');
    }
}
