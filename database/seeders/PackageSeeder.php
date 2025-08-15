<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Service;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // Paket Ekonomi
        $ekonomi = Package::create([
            'name' => 'Ekonomi',
            'description' => 'Paket badal umroh dasar dengan dokumentasi lengkap dan pelayanan standar.',
            'price' => 2500000,
            'original_price' => 3000000,
            'label' => 'POPULER',
            'color' => 'blue'
        ]);

        $ekonomiServices = Service::whereIn('name', [
            'Tawaf & Sa\'i lengkap',
            'Video dokumentasi HD',
            'Foto dokumentasi (10 foto)',
            'Sertifikat digital',
            'Support 24/7'
        ])->pluck('id');

        $ekonomi->services()->sync($ekonomiServices);

        // Paket Standar
        $standar = Package::create([
            'name' => 'Standar',
            'description' => 'Paket lengkap dengan fasilitas tambahan dan dokumentasi premium.',
            'price' => 4200000,
            'original_price' => 5000000,
            'label' => 'DIREKOMENDASIKAN',
            'color' => 'orange'
        ]);

        $standarServices = Service::whereIn('name', [
            'Tawaf & Sa\'i lengkap',
            'Video dokumentasi HD',
            'Foto dokumentasi (10 foto)',
            'Sertifikat digital',
            'Support 24/7',
            'Video 4K quality',
            'Foto dokumentasi (25 foto)',
            'Doa khusus disebutkan',
            'Live tracking GPS',
            'Konsultasi dengan ustadz'
        ])->pluck('id');

        $standar->services()->sync($standarServices);

        // Paket Premium
        $premium = Package::create([
            'name' => 'Premium',
            'description' => 'Paket eksklusif dengan layanan VIP dan dokumentasi sinematik profesional.',
            'price' => 7500000,
            'original_price' => 9000000,
            'label' => 'VIP',
            'color' => 'purple'
        ]);

        $premiumServices = Service::whereIn('name', [
            'Tawaf & Sa\'i lengkap',
            'Video dokumentasi HD',
            'Foto dokumentasi (10 foto)',
            'Sertifikat digital',
            'Support 24/7',
            'Video 4K quality',
            'Foto dokumentasi (25 foto)',
            'Doa khusus disebutkan',
            'Live tracking GPS',
            'Konsultasi dengan ustadz',
            'Video sinematik profesional',
            'Foto unlimited + album digital',
            'Live streaming tersedia',
            'Pelaksana berpengalaman 10+ tahun',
            'Sertifikat fisik + bingkai'
        ])->pluck('id');

        $premium->services()->sync($premiumServices);
    }
}
