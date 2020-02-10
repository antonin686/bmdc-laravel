<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenericsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('generic_name');
            $table->string('indications');
            $table->string('therapeutic_class');
            $table->string('pharmacology');
            $table->string('dosage_administration');
            $table->string('interaction');
            $table->string('contraindications');
            $table->string('side_effects');
            $table->string('pregnancy');
            $table->string('precautions');
            $table->string('overdose_effects');
            $table->string('storage_conditions');
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
        Schema::dropIfExists('generics');
    }
}
