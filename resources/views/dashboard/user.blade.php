@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<h1 class="text-2xl font-bold mb-4">Riwayat Order Anda</h1>

<a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Buat Order Baru</a>

<div class="mt-6">
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Kode</th>
                <th class="p-2">Paket</th>
                <th class="p-2">Status</th>
                <th class="p-2">Tanggal Pelaksanaan</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders ?? [] as $order)
            <tr>
                <td class="p-2">{{ $order->order_code }}</td>
                <td class="p-2">{{ $order->package->name }}</td>
                <td class="p-2">{{ ucfirst($order->status) }}</td>
                <td class="p-2">{{ $order->execution_date ?? '-' }}</td>
                <td class="p-2">
                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-500 hover:underline">Detail</a>
                    @if($order->status === 'pending')
                        <a href="{{ route('payments.create', $order->id) }}" class="ml-2 text-green-500 hover:underline">Bayar</a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center">Belum ada order</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
