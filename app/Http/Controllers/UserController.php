<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('nama', 'LIKE', '%' . request('cari') . '%')
            ->where('email', 'LIKE', '%' . request('cari') . '%')
            ->where('hak_akses', '!=', 'SANTRI')
            ->latest()->paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'hak_akses' => 'required'
        ]);

        $validated['password'] = bcrypt($request->password);

        User::create($validated);

        return redirect()->route('users.index')->with('berhasil', 'User berhasil ditambah!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'hak_akses' => 'required'
        ]);

        if ($validated['password']) {
            $validated['password'] = bcrypt($request->password);
        } else {
            $validated['password'] = $user->password;
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('berhasil', 'User berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('berhasil', 'User berhasil dihapus');
    }
}