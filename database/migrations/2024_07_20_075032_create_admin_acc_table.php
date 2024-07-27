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
        Schema::create('admin_acc', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('nama_admin', 50);
            $table->string('username', 20);
            $table->string('password', 255);
            $table->enum('level', ['admin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_acc');
    }
};
