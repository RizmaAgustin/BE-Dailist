<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign key untuk relasi ke users
            $table->string('title'); // Judul tugas
            $table->text('description')->nullable(); // Deskripsi tugas

            // Kategori tugas: kerja, pribadi, belajar
            $table->enum('category', ['kerja', 'pribadi', 'belajar'])->default('pribadi');

            // Prioritas tugas (disesuaikan, misalnya dengan bahasa Indonesia)
            $table->enum('priority', ['rendah', 'sedang', 'tinggi'])->default('sedang');

            $table->timestamp('deadline')->nullable(); // Deadline tugas
            $table->boolean('is_completed')->default(false); // Status apakah tugas sudah selesai
            $table->timestamps(); // created_at dan updated_at

            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
