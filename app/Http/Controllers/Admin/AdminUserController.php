<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $role = Role::find($request->role_id);
        $user->assignRole($role->name);

        UserProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => $request->name, // bisa default pakai name user
                'phone' => null,
                'address' => null,
                'passport_number' => null,
            ]
        );


        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        $user->load('roles');
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        return view('admin.users.show', compact('user', 'userProfile'));
    }
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|min:6|confirmed',
            'role_id' => 'required|exists:roles,id',
            // validasi profile
            'full_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'passport_number' => 'nullable|string|max:100',
        ]);

        // Update user
        $data = $request->only('name', 'email');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        $role = Role::find($request->role_id);
        $user->syncRoles([$role->name]);

        // Update atau buat profile
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only('full_name', 'phone', 'address', 'passport_number')
        );

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy(User $user)
    {
        $user->profile()->delete();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
