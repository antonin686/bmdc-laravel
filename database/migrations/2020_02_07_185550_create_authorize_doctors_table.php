<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizeDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorize_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nid');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('speciality');
            $table->string('degree');
            $table->string('doc_path')->nullable();
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
        Schema::dropIfExists('authorize_doctors');
    }
}
