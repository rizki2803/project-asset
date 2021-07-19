<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_bar', function (Blueprint $table) {
            $table->uuid('out_id')->primary();
            $table->date('out_tgl')->nullable();
            $table->uuid('mb_id')->nullable();
            $table->string('out_pjwb')->nullable();
            $table->uuid('p_id')->nullable();
            $table->uuid('s_id')->nullable();
            $table->string('out_ket')->nullable();
            $table->integer('out_jml')->nullable();
            $table->string('out_cr_by')->nullable();
            $table->datetime('out_cr_at')->nullable();
            $table->string('out_up_by')->nullable();
            $table->datetime('out_up_at')->nullable();
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
        Schema::dropIfExists('out_bar');
    }
}
