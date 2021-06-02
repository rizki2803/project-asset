<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarPTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bar_p', function (Blueprint $table) {
            $table->uuid('p_id')->primary();
            $table->boolean('p_stat')->nullable();
            $table->string('p_reg')->nullable();
            $table->string('p_nmusr')->nullable();
            $table->string('p_dprt')->nullable();
            $table->string('p_atsn')->nullable();
            $table->string('p_email')->nullable();
            $table->string('p_asst')->nullable();
            $table->string('p_merk')->nullable();
            $table->string('p_desk')->nullable();
            $table->string('p_pmrks')->nullable();
            $table->enum('p_approv', ['1', '2', '3'])->nullable();
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
        Schema::dropIfExists('bar_p');
    }
}
