<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kat_bar', function (Blueprint $table) {
            $table->uuid('kt_id')->primary();
            $table->string('kt_kode')->nullable();
            $table->string('kt_nm')->nullable();
            $table->string('kt_cr_by')->nullable();
            $table->datetime('kt_cr_at')->nullable();
            $table->string('kt_up_by')->nullable();
            $table->datetime('kt_up_at')->nullable();
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
        Schema::dropIfExists('kat_bar');
    }
}
