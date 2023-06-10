<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $santri = Santri::where('user_id', auth()->id())->first();

        $lengkapMendaftar = $santri && $santri->pendidikan && $santri->orangTua;

        return view('profil', compact('lengkapMendaftar', 'santri'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|min:8|confirmed'
        ]);

        $user = User::findOrFail(auth()->id());

        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        return back()->with('berhasil', 'Profil berhasil diubah.');
    }
}
