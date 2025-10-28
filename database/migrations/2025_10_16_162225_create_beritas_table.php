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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255); // Judul berita (required)
            $table->string('slug', 255)->unique(); // Slug untuk URL yang ramah SEO (required)
            $table->text('konten'); // Konten/Isi berita yang panjang (required)
            $table->string('foto', 255)->nullable(); // Path foto utama (nullable, karena optional)
            // Anda bisa menambahkan kolom lain seperti 'penulis' atau 'kategori' di sini.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};