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
        Schema::create('user_acc', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama_user', 50);
            $table->string('username', 20);
            $table->string('password', 255);
            $table->enum('level', ['User']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_acc');
    }
};
