<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('med_id');
            $table->string('alert_gender')->nullable();
            $table->float('age_range(low)')->nullable();
            $table->float('age_range(high)')->nullable();
            $table->float('alert_range')->nullable();
            $table->string('med_unit')->nullable();
            $table->float('max_duration')->nullable();
            $table->string('duration_unit')->nullable();
            $table->string('alert_for')->nullable();
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
        Schema::dropIfExists('med_alerts');
    }
}
