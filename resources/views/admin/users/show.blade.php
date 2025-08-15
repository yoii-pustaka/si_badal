@extends('layouts.admin')

@section('title', 'Detail User')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detail User</h1>

<div class="bg-white p-6 rounded shadow max-w-xl">
    <h2 class="text-lg font-semibold mb-4">Informasi Akun</h2>
    <p><strong>Nama Akun:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->roles->pluck('name')->implode(', ') }}</p>

    <h2 class="text-lg font-semibold mt-6 mb-4">Profil Lengkap</h2>
    @if($user->profile)
        <p><strong>Nama Lengkap:</strong> {{ $user->profile->full_name }}</p>
        <p><strong>No. Telepon:</strong> {{ $user->profile->phone ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $user->profile->address ?? '-' }}</p>
        @if($user->roles->pluck('name')->contains('pelaksana'))
            <p><strong>No. Paspor:</strong> {{ $user->profile->passport_number ?? '-' }}</p>
        @endif
    @else
        <p class="text-gray-500">Belum ada data profil</p>
    @endif

    <div class="mt-6">
        <a href="{{ route('admin.users.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>
</div>
@endsection
