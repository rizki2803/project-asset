<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSrvcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srvc', function (Blueprint $table) {
            $table->uuid('s_id')->primary();
            $table->uuid('p_id')->nullable();
            $table->boolean('s_stat')->nullable();
            $table->enum('s_pick', ['0', '1', '2'])->nullable();
            $table->string('s_vndr')->nullable();
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
        Schema::dropIfExists('srvc');
    }
}
