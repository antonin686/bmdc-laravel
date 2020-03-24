<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_id');
            $table->bigInteger('citizen_id');
            $table->string('hospital_name');
            $table->string('mainbody');
            $table->string('med_list');
            $table->string('disease');
            $table->string('cc')->nullable();
            $table->string('oe')->nullable();
            $table->string('lx')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('prescriptions');
    }
}
