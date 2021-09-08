<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestApiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_api', function (Blueprint $table) {

            $table->string('a_nik')->primary();
            $table->string('a_nmusr')->nullable();
            $table->string('a_dprt')->nullable();
            $table->string('a_atsn')->nullable();
            $table->string('a_email')->nullable();
            $table->date('a_tgl')->nullable();
            $table->string('a_act')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_api');
    }
}
