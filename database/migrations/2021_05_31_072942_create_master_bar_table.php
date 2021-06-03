<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_bar', function (Blueprint $table) {
            $table->uuid('mb_id')->primary();
            $table->string('mb_kode')->nullable();
            $table->string('mb_nmbar')->nullable();
            $table->string('mb_satbar')->nullable();
            $table->string('mb_katbar')->nullable();
            $table->integer('mb_jmlbar')->nullable();
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
        Schema::dropIfExists('master_bar');
    }
}
