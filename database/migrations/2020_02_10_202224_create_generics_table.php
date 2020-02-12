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
            $table->text('indications');
            $table->string('therapeutic_class');
            $table->text('pharmacology');
            $table->text('dosage_administration')->nullable();
            $table->text('interaction')->nullable();
            $table->text('contraindications')->nullable();
            $table->text('side_effects')->nullable();
            $table->text('pregnancy')->nullable();
            $table->text('precautions')->nullable();
            $table->text('overdose_effects')->nullable();
            $table->text('storage_conditions')->nullable();
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
