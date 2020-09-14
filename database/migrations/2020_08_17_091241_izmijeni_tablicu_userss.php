<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmijeniTablicuUserss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('semestar_id')->unsigned()->nullable();
            $table->bigInteger('studij_id')->unsigned()->nullable();
            $table->enum('vrsta', ['student', 'nastavnik', 'admin']);

            $table->foreign('semestar_id')->references('id')->on('semestar');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
