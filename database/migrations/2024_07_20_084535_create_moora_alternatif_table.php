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
        Schema::create('moora_alternatif', function (Blueprint $table) {
            $table->tinyIncrements('id_alternatif');
            $table->unsignedInteger('id_siswa')->nullable();
            $table->string('alternatif', 50);
            $table->string('jarak', 20);
            $table->string('rata_nilai', 20);
            $table->string('penghasilan', 50);
            $table->string('tanggungan', 20);
            $table->string('kehadiran', 20);
            $table->string('pendidikan', 20);;
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_siswa')
                  ->references('id_siswa')
                  ->on('data_siswa')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moora_alternatif');
    }
};
