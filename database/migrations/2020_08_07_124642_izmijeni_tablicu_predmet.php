<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmijeniTablicuPredmet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predmet', function (Blueprint $table) {
            $table->bigInteger('nastavnik_id')->unsigned();
            
            $table->foreign('nastavnik_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predmet', function (Blueprint $table) {
            //
        });
    }
}
