<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuOcjene extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocjene', function (Blueprint $table) {
            $table->id();
            $table->dateTime('vrijeme_polaganja');
            $table->bigInteger('ocjena');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('predmet_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('predmet_id')->references('id')->on('predmet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocjene');
    }
}
