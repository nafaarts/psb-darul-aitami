<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadBuktiDaftarUlangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'ijazah' => 'required|mimes:pdf|max:3072',
            'kartu_keluarga' => 'required|mimes:pdf|max:3072',
            'bukti_uang_pangkal' => 'required|image|max:2048',
            'ukuran_baju_olahraga' => 'required'
        ]);

        $request->file('ijazah')->store('public/ijazah/');
        $request->file('kartu_keluarga')->store('public/kartu_keluarga/');
        $request->file('bukti_uang_pangkal')->store('public/bukti_uang_pangkal/');

        $santri = auth()->user()->santri;
        $santri->update([
            'ijazah' => $request->file('ijazah')->hashName(),
            'kartu_keluarga' => $request->file('kartu_keluarga')->hashName(),
            'bukti_uang_pangkal' => $request->file('bukti_uang_pangkal')->hashName(),
            'ukuran_baju_olahraga' => $request->ukuran_baju_olahraga
        ]);

        return back()->with('berhasil', 'Berkas daftar ulang berhasil diupload');
    }
}
