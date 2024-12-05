<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   

    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('profile.index', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validasi dan mengisi data user dengan data yang sudah divalidasi
        $request->user()->fill($request->validated());
    
        // Jika ada perubahan pada email, maka set email_verified_at menjadi null
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        // Simpan perubahan pada data user
        $request->user()->save();
    
        // Redirect kembali ke halaman edit dengan pesan status 'profile-updated'
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
