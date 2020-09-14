<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NapraviTablicuIspitniRok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ispitni_rok', function (Blueprint $table) {
            $table->id();
            $table->string('sezona', 100);
            $table->dateTime('vrijeme_odrzavanja');
            $table->bigInteger('predmet_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('ispitni_rok');
    }
}
