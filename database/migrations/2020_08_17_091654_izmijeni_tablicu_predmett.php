<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmijeniTablicuPredmett extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predmet', function (Blueprint $table) {
            $table->bigInteger('semestar_id')->unsigned()->nullable();

            $table->foreign('semestar_id')->references('id')->on('semestar');
        
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
