@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100 p-6">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 mb-6">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold">
                    {{ strtoupper(substr($user->full_name, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $user->full_name }}</h1>
                    <p class="text-gray-500 text-sm">Profil Pengguna</p>
                </div>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 space-y-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Informasi Pribadi</h2>
                <dl class="space-y-4">
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Nama Lengkap</dt>
                        <dd class="text-gray-800 font-medium">{{ $user->full_name }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Nomor Telepon</dt>
                        <dd class="text-gray-800 font-medium">{{ $user->phone ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Alamat</dt>
                        <dd class="text-gray-800 font-medium">{{ $user->address ?? '-' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-600">Nomor Passport</dt>
                        <dd class="text-gray-800 font-medium">{{ $user->passport_number ?? '-' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end mt-6 space-x-3">
            <a href="{{ route('dashboard') }}" 
               class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition">
                Kembali
            </a>
            <a href="{{ route('profile.edit', $user->id) }}" 
               class="px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
