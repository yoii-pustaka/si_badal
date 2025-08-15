@extends('layouts.pelaksana')

@section('title', 'Dashboard Pelaksana')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tugas Anda</h1>

<div class="bg-white p-4 rounded shadow">
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Kode</th>
                <th class="p-2">Pendaftar</th>
                <th class="p-2">Paket</th>
                <th class="p-2">Tanggal Pelaksanaan</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders ?? [] as $order)
            <tr>
                <td class="p-2">{{ $order->order_code }}</td>
                <td class="p-2">{{ $order->nama_pendaftar }}</td>
                <td class="p-2">{{ $order->package->name }}</td>
                <td class="p-2">{{ $order->execution_date }}</td>
                <td class="p-2">
                    <a href="{{ route('pelaksana.show', $order->id) }}" class="text-blue-500 hover:underline">Detail</a>
                    <a href="{{ route('pelaksana.upload', $order->id) }}" class="ml-2 text-green-500 hover:underline">Upload Bukti</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center">Tidak ada tugas saat ini</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
