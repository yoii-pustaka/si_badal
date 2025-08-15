<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama paket: Ekonomi, Standar, Premium
            $table->text('description')->nullable(); // Deskripsi paket
            $table->decimal('price', 15, 2); // Harga paket
            $table->decimal('original_price', 15, 2)->nullable(); // Harga sebelum diskon
            $table->string('label')->nullable(); // Label misal: POPULER, VIP, dll
            $table->string('color')->nullable(); // Warna tema paket
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
