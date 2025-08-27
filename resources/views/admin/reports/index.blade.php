@extends('layouts.admin')

@section('title', 'Laporan Order')

@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Laporan Order</h1>

    <!-- Filter -->
<form method="GET" action="{{ route('admin.report') }}" class="mb-6 flex flex-wrap gap-4">
    <select name="status" class="px-3 py-2 border rounded-lg text-sm">
        <option value="">Semua Status</option>
        <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ request('status')=='in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ request('status')=='completed' ? 'selected' : '' }}>Completed</option>
        <option value="cancelled" {{ request('status')=='cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>

    <select name="pelaksana_id" class="px-3 py-2 border rounded-lg text-sm">
        <option value="">Semua Pelaksana</option>
        @foreach($pelaksanas as $pelaksana)
            <option value="{{ $pelaksana->id }}" 
                {{ request('pelaksana_id') == $pelaksana->id ? 'selected' : '' }}>
                {{ $pelaksana->name }}
            </option>
        @endforeach
    </select>

    <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}" class="px-3 py-2 border rounded-lg text-sm">
    <input type="date" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}" class="px-3 py-2 border rounded-lg text-sm">

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Terapkan</button>
</form>


    <!-- Tombol Export -->
    <div class="mb-4 flex space-x-2">
        <a href="{{ route('admin.exportPdf', request()->all()) }}"
            class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Export PDF</a>
        <a href="{{ route('admin.exportCsv', request()->all()) }}"
            class="px-4 py-2 bg-green-500 text-white rounded-lg text-sm">Export CSV</a>
        <button onclick="window.print()"
            class="px-4 py-2 bg-gray-600 text-white rounded-lg text-sm">Print</button>
    </div>


    <!-- Tabel -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">Kode Order</th>
                    <th class="px-6 py-3 text-left">User</th>
                    <th class="px-6 py-3 text-left">Paket</th>
                    <th class="px-6 py-3 text-left">Pelaksana</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Tanggal Pelaksanaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td class="px-6 py-4">{{ $order->order_code }}</td>
                    <td class="px-6 py-4">{{ $order->user->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $order->package->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $order->pelaksana->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ ucfirst(str_replace('_',' ',$order->status)) }}</td>
                    <td class="px-6 py-4">{{ $order->tanggal_pelaksanaan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection