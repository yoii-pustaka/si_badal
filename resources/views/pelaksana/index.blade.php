@extends('layouts.pelaksana')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Tugas Anda</h1>

    @if($orders->isEmpty())
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded-lg">
            Tidak ada tugas yang perlu dikerjakan.
        </div>
    @else
        <div class="grid gap-4">
            @foreach($orders as $order)
                <div class="p-4 bg-white rounded-lg shadow flex justify-between items-center">
                    <div>
                        <h2 class="font-semibold text-lg">{{ $order->nama_alm }} ({{ $order->bin_binti }})</h2>
                        <p class="text-sm text-gray-500">
                            Paket: {{ $order->package->name }} | Status: {{ ucfirst($order->status) }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('pelaksana.orders.show', $order->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Detail</a>
                        <a href="{{ route('pelaksana.orders.uploadForm', $order->id) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Upload Video</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
