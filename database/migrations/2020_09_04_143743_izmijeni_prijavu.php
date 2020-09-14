<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmijeniPrijavu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prijava', function (Blueprint $table) {
            $table->enum('status', ['prijavljeno', 'položeno', 'nije položeno', 'nije polagano']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prijava', function (Blueprint $table) {
            //
        });
    }
}
