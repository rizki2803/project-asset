<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sat_bar', function (Blueprint $table) {
            $table->uuid('sb_id')->primary();
            $table->string('sb_nm')->nullable();
            $table->string('sb_cr_by')->nullable();
            $table->datetime('sb_cr_at')->nullable();
            $table->string('sb_up_by')->nullable();
            $table->datetime('sb_up_at')->nullable();
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
        Schema::dropIfExists('sat_bar');
    }
}
