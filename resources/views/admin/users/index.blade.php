@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('content')
<h1 class="text-2xl font-bold mb-6">Manajemen User</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.users.create') }}" 
   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">
    + Tambah User
</a>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Nama</th>
                <th class="p-2">Email</th>
                <th class="p-2">Role</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr class="border-t">
                <td class="p-2">{{ $user->name }}</td>
                <td class="p-2">{{ $user->email }}</td>
                <td class="p-2">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                       class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" 
                          method="POST" onsubmit="return confirm('Hapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                    <a href="{{ route('admin.users.show', $user->id) }}" 
                       class="text-green-500 hover:underline">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-gray-500">Belum ada user</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $users->links() }}
</div>
@endsection
