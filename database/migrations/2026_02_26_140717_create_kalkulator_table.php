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
        Schema::create('kalkulator', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pt');
            $table->string('alamat_pt');
            $table->integer('tenaga_kerja');
            $table->decimal('omzet_1', 15, 2)->default(0);
            $table->decimal('omzet_2', 15, 2)->default(0);
            $table->decimal('omzet_3', 15, 2)->default(0);
            $table->decimal('omzet_4', 15, 2)->default(0);
            $table->decimal('omzet_5', 15, 2)->default(0);
            $table->decimal('omzet_6', 15, 2)->default(0);
            $table->decimal('omzet_7', 15, 2)->default(0);
            $table->decimal('omzet_8', 15, 2)->default(0);
            $table->decimal('omzet_9', 15, 2)->default(0);
            $table->decimal('omzet_10', 15, 2)->default(0);
            $table->decimal('omzet_11', 15, 2)->default(0);
            $table->decimal('omzet_12', 15, 2)->default(0);
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
        Schema::dropIfExists('kalkulator');
    }
};
