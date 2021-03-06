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
            $table->enum('p_kat', ['0','1'])->nullable();
            $table->string('p_reg')->nullable();
            $table->string('p_nmusr')->nullable();
            $table->string('p_dprt')->nullable();
            $table->string('p_atsn')->nullable();
            $table->string('p_email')->nullable();
            $table->string('p_asst')->nullable();
            $table->string('p_merk')->nullable();
            $table->string('p_desk')->nullable();
            $table->string('p_pmrks')->nullable();
            $table->date('p_tgl')->nullable();
            $table->string('p_nik')->nullable();
            $table->string('p_act')->nullable();
            $table->uuid('mb_id')->nullable();
            $table->string('p_cr_by')->nullable();
            $table->datetime('p_cr_at')->nullable();
            $table->string('p_up_by')->nullable();
            $table->datetime('p_up_at')->nullable();
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
