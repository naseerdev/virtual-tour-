<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('monday_b');
            $table->string('monday_d');
            $table->string('tuesday_b');
            $table->string('tuesday_d');
            $table->string('wednesday_b');
            $table->string('wednesday_d');
            $table->string('thursday_b');
            $table->string('thursday_d');
            $table->string('friday_b');
            $table->string('friday_d');
            $table->string('saturday_b');
            $table->string('saturday_d');
            $table->string('sunday_b');
            $table->string('sunday_d');
            $table->integer('user_id');
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
        Schema::dropIfExists('meals');
    }
}
