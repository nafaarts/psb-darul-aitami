<?php

namespace App\Http\Controllers;

use App\Models\KategoriNilai;
use Illuminate\Http\Request;

class KategoriNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriNilai::when(request('cari'), function ($query) {
            return $query->where('nama_pelajaran', 'like', '%' . request('cari') . '%');
        })
            ->orderBy('kategori')
            ->paginate();
        return view('kategori-nilai.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori-nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelajaran' => 'required',
            'kategori' => 'required',
        ]);

        $validated['slug'] = str()->slug($validated['nama_pelajaran']);

        KategoriNilai::create($validated);

        return redirect()->route('kategori-nilai.index')->with('berhasil', 'Kategori nilai berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriNilai $kategori)
    {
        return view('kategori-nilai.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriNilai $kategori)
    {
        $validated = $request->validate([
            'nama_pelajaran' => 'required',
            'kategori' => 'required',
        ]);

        $validated['slug'] = str()->slug($validated['nama_pelajaran']);

        $kategori->update($validated);

        return redirect()->route('kategori-nilai.index')->with('berhasil', 'Kategori nilai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriNilai $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori-nilai.index')->with('berhasil', 'Kategori nilai berhasil dihapus!');
    }
}
