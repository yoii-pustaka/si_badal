<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show()
    {
        $user = UserProfile::where('user_id', auth()->id())->firstOrFail();

        return view('profile.show', compact('user'));
    }

    /**
     * Form edit profil.
     */
    public function edit(Request $request)
    {
        $user = UserProfile::where('user_id', auth()->id())->firstOrFail();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update profil user_profile, bukan langsung tabel users.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $profile = UserProfile::where('user_id', auth()->id())->firstOrFail();

        $profile->update($request->validated());

        return Redirect::route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Hapus akun + profil user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::logout();

        // hapus profile dulu
        $user->profile()->delete();

        // hapus akun user
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
