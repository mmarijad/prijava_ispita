<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuPredmet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predmet', function (Blueprint $table) {
            $table->id();
            $table->string('ime', 100);
            $table->bigInteger('ECTS');
            $table->string('status', 15);
            $table->string('semestar', 10);
            $table->bigInteger('studij_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('studij_id')->references('id')->on('studij');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predmet');
    }
}
