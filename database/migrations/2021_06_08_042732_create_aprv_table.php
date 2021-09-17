<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprv', function (Blueprint $table) {
            $table->uuid('a_id')->primary();
            $table->enum('a_seq', ['0', '1', '2'])->nullable();
            $table->string('a_nm')->nullable();
            $table->string('a_nik')->nullable();
            $table->uuid('p_id')->nullable();
            $table->enum('a_stat', ['0', '1', '2', '3', '4', '5'])->nullable();
            $table->boolean('a_cur_p')->nullable();
            $table->string('a_cr_by')->nullable();
            $table->datetime('a_cr_at')->nullable();
            $table->string('a_up_by')->nullable();
            $table->datetime('a_up_at')->nullable();
            $table->datetime('a_expr')->nullable();
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
        Schema::dropIfExists('aprv');
    }
}
