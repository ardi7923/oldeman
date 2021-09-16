<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionRainfallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediction_rainfalls', function (Blueprint $table) {
            $table->id();
            $table->string("year", 4)->unique();
            $table->double("jan");
            $table->double("feb");
            $table->double("mar");
            $table->double("apr");
            $table->double("may");
            $table->double("jun");
            $table->double("jul");
            $table->double("ags");
            $table->double("sep");
            $table->double("oct");
            $table->double("nov");
            $table->double("des");
            $table->double("bb")->nullable();
            $table->double("bk")->nullable();
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
        Schema::dropIfExists('prediction_rainfalls');
    }
}
