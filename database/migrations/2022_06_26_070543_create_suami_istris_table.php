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
        Schema::create('suami_istris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 255)->nullable();
            $table->string('nik', 255)->nullable();
            $table->string('jenis_kelamin', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_ibu', 255)->nullable();
            $table->string('nama_ayah', 255)->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('golongan_darah', 255)->nullable();
            $table->string('hobby', 255)->nullable();
            $table->string('no_hp', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('media_sosial', 255)->nullable(); 
            $table->text('foto')->nullable(); 
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
        Schema::dropIfExists('suami_istris');
    }
};
