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
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->integer('nik')->primary();
            $table->string('nama')->nullable(false);
            $table->string('jabatan')->nullable(false);
            $table->string('username')->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('user_accounts');
    }
};
