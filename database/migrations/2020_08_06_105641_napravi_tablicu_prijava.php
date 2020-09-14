<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuPrijava extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijava', function (Blueprint $table) {
            $table->id();
            $table->dateTime('vrijeme_prijave');
            $table->boolean('prijavljeno')->default(false);
            $table->bigInteger('brojac_prijava');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('ispit_id')->unsigned();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('ispit_id')->references('id')->on('ispitni_rok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prijava');
    }
}
