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
        Schema::create('moora_nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->tinyInteger('id_alternatif')->unsigned()->nullable();
            $table->tinyInteger('id_kriteria')->unsigned()->nullable();
            $table->tinyInteger('nilai')->unsigned();
            $table->timestamps();

            // Optional: Add foreign key constraints if needed
            // $table->foreign('id_alternatif')->references('id_alternatif')->on('moo_alternatif')->onDelete('set null');
            // $table->foreign('id_kriteria')->references('id_kriteria')->on('moo_kriteria')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moora_nilai');
    }
};
