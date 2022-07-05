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
        Schema::create('grejawis', function (Blueprint $table) {
            $table->id();
            $table->string('tempat_baptis', 255)->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->string('tempat_sidi', 255)->nullable();
            $table->date('tanggal_sidi')->nullable();
            $table->string('tempat_menikah', 255)->nullable();
            $table->date('tanggal_menikah')->nullable();
            $table->string('tempat_tahbisan', 255)->nullable();
            $table->date('tanggal_tahbisan')->nullable();
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
        Schema::dropIfExists('grejawis');
    }
};
