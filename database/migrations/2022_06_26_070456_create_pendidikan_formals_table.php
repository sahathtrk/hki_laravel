<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_formals', function (Blueprint $table) {
            $table->id();
            $table->string('sekolah_dasar', 255)->nullable();
            $table->string('tahun_masuk_sd', 255)->nullable();
            $table->string('tahun_selesai_sd', 255)->nullable();
            $table->string('sekolah_menengah_pertama', 255)->nullable();
            $table->string('tahun_masuk_smp', 255)->nullable();
            $table->string('tahun_selesai_smp', 255)->nullable();
            $table->string('sekolah_menengah_atas', 255)->nullable();
            $table->string('tahun_masuk_sma', 255)->nullable();
            $table->string('tahun_selesai_sma', 255)->nullable();
            $table->foreignId('akun_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pendidikan_formals');
    }
};
