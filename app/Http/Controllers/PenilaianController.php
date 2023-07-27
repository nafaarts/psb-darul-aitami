<?php

namespace App\Http\Controllers;

use App\Models\KategoriNilai;
use App\Models\Santri;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Santri $santri)
    {
        $dataNilai = collect($request->nilai)->map(
            fn ($item, $index) =>  [
                'nama' => $index,
                'nilai' => $item
            ]
        )->values();

        foreach ($dataNilai as $data) {
            // nilal : id, santri_id, kategori_nilai_id, nilai
            $kategoriNilai = KategoriNilai::where('slug', $data['nama'])->firstOrFail();
            $santri->nilai()->updateOrCreate(['kategori_nilai_id' => $kategoriNilai->id,], [
                'nilai' => $data['nilai']
            ]);
        }

        return redirect()->route('santri.detail', $santri)->with('berhasil', 'Nilai berhasil diubah!');
    }
}
