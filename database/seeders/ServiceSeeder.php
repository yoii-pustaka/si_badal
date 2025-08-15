<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Tawaf & Sa\'i lengkap'],
            ['name' => 'Video dokumentasi HD'],
            ['name' => 'Foto dokumentasi (10 foto)'],
            ['name' => 'Sertifikat digital'],
            ['name' => 'Support 24/7'],
            ['name' => 'Video 4K quality'],
            ['name' => 'Foto dokumentasi (25 foto)'],
            ['name' => 'Doa khusus disebutkan'],
            ['name' => 'Live tracking GPS'],
            ['name' => 'Konsultasi dengan ustadz'],
            ['name' => 'Video sinematik profesional'],
            ['name' => 'Foto unlimited + album digital'],
            ['name' => 'Live streaming tersedia'],
            ['name' => 'Pelaksana berpengalaman 10+ tahun'],
            ['name' => 'Sertifikat fisik + bingkai'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
