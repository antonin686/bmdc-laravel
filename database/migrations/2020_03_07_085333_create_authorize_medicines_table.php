<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizeMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorize_medicines', function (Blueprint $table) {
            $table->bigIncrements('id', 1000);
            $table->string('brand_name');
            $table->string('dosage_form');
            $table->bigInteger('generic_id');
            $table->string('strength');
            $table->string('company');
            $table->float('price');
            $table->string('applicant_name');
            $table->string('applicant_email');
            $table->string('applicant_phone');
            $table->string('img_path')->nullable();
            $table->integer('status')->default(0);  
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
        Schema::dropIfExists('authorize_medicines');
    }
}
