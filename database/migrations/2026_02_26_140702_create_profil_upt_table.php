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
        Schema::create('profil_upt', function (Blueprint $table) {
            $table->id();
            $table->string('foto_struktur')->nullable();   // path gambar struktur organisasi
            $table->text('tugas_fungsi')->nullable();      // teks tugas dan fungsi
            $table->text('visi')->nullable();              // teks visi
            $table->text('misi')->nullable();              // teks misi
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
        Schema::dropIfExists('profil_upt');
    }
};
