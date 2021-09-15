<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('goal_segnato', 4, 2);
            $table->float('goal_subito', 4, 2);
            $table->float('rigore_segnato', 4, 2);
            $table->float('rigore_sbagliato', 4, 2);
            $table->float('rigore_parato', 4, 2);
            $table->float('ammonizione', 4, 2);
            $table->float('espulsione', 4, 2);
            $table->float('autogoal', 4, 2);
            $table->float('assist_soft', 4, 2);
            $table->float('assist_tradizionale', 4, 2);
            $table->float('assist_gold', 4, 2);
            $table->float('goal_decisivo_pareggio', 4, 2);
            $table->float('goal_decisivo_vittoria', 4, 2);
            $table->float('portiere_imbattuto', 4, 2);
            $table->integer('id_user');
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
        Schema::dropIfExists('leagues');
    }
}
