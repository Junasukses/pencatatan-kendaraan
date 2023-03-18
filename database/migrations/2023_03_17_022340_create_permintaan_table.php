<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alasan');
            $table->date('keberangkatan')->nullable();
            $table->date('sampai')->nullable();
            $table->string('status')->default('nunggu');
            $table->foreignId('kendaraan_id')->nullable()->constrained('kendaraan');
            $table->foreignId('driver_id')->nullable()->constrained('driver');
            $table->foreignId('user_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('permintaan');
    }
}
