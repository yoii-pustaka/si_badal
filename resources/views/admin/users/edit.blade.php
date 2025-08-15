@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit User</h1>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
               class="w-full border p-2 rounded">
        @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
               class="w-full border p-2 rounded">
        @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Password Baru (Opsional)</label>
        <input type="password" name="password" class="w-full border p-2 rounded">
        @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Role</label>
        <select name="role_id" class="w-full border p-2 rounded">
            @foreach($roles as $id => $name)
                <option value="{{ $id }}" {{ $user->roles->first()?->id == $id ? 'selected' : '' }}>
                    {{ ucfirst($name) }}
                </option>
            @endforeach
        </select>
        @error('role_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        <a href="{{ route('admin.users.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </div>
</form>
@endsection
