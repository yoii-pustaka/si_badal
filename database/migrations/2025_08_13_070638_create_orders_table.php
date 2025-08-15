<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique(); // kode unik untuk tracking
            $table->string('nama_alm');
            $table->string('bin_binti');
            $table->enum('kondisi', ['almarhum', 'tua renta', 'sakit']);
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pendaftar
            $table->foreignId('pelaksana_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->enum('status', ['pending', 'paid', 'in_progress','assigned', 'completed', 'cancelled'])->default('pending');
            $table->text('alamat_pendaftar')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->text('keterangan')->nullable(); // disamakan dengan form
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
