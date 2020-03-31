<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nid')->nullable()->unique();
            $table->bigInteger('birthCer_id')->unique();
            $table->bigInteger('deathCer_id')->nullable()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('contact')->unique();
            $table->bigInteger('father_nid');
            $table->bigInteger('mother_nid');
            $table->text('current_address');
            $table->text('premanent_address');
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
        Schema::dropIfExists('citizens');
    }
}
