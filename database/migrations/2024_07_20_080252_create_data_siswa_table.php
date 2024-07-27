<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->integer('id_siswa')->unsigned()->autoIncrement();
            $table->string('nama_siswa', 50);
            $table->set('penghasilan', ['Lebih dari Rp 4.000.000', 'Rp 2.000.000 - Rp 4.000.000', 'Rp 1.000.000 - Rp 2.000.000', 'Rp 50.000 - Rp 1.000.000']);
            $table->string('jarak', 20);
            $table->integer('tanggungan');
            $table->set('pendidikan', ['SARJANA', 'DIPLOMA', 'SMA', 'SMP', 'SD']);
            $table->integer('rata_nilai');
            $table->integer('kehadiran');
            $table->integer('nis');
            $table->string('nama_ayah', 50);
            $table->string('nama_ibu', 50);
            $table->string('pekerjaan_ayah', 50);
            $table->string('pekerjaan_ibu', 50);
            $table->string('alamat', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_siswa');
    }
};
