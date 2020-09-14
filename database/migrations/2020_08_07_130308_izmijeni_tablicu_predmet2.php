<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmijeniTablicuPredmet2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predmet', function (Blueprint $table) {
            $table->enum('status', ['preddiplomski', 'diplomski']);
            $table->enum('semestar', ['1.', '2.', '3.', '4.', '5.', '6.']);
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
