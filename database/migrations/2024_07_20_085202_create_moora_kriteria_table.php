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
        Schema::create('moora_kriteria', function (Blueprint $table) {
            $table->tinyIncrements('id_kriteria');
            $table->string('kode', 5);
            $table->string('kriteria', 100);
            $table->enum('type', ['Benefit', 'Cost']);
            $table->float('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moora_kriteria');
    }
};
