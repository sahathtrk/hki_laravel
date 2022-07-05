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
        Schema::create('pendidikan_informals', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pendidikan_informal', 255)->nullable();
            $table->string('tanggal_kegiatan_program', 255)->nullable();
            $table->string('tempat_kegiatan_program', 255)->nullable();
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
        Schema::dropIfExists('pendidikan_informals');
    }
};
