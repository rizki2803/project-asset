<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_bar', function (Blueprint $table) {
            $table->uuid('in_id')->primary();
            $table->string('in_asst')->nullable();
            $table->date('in_tgl')->nullable();
            $table->string('in_vndr')->nullable();
            $table->uuid('mb_id')->nullable();
            $table->string('in_pjwb')->nullable();
            $table->string('in_ket')->nullable();
            $table->uuid('p_id')->nullable();
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
        Schema::dropIfExists('in_bar');
    }
}
