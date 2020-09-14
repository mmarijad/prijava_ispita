<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmijeniRokove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ispitni_rok', function (Blueprint $table) {
            $table->bigInteger('sezona_id')->unsigned();
            $table->foreign('sezona_id')->references('id')->on('sezona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ispitni_rok', function (Blueprint $table) {
            //
        });
    }
}
