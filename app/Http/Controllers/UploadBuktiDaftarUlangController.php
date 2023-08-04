<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadBuktiDaftarUlangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'bukti_uang_pangkal' => 'required|image|max:2048'
        ]);

        $request->file('bukti_uang_pangkal')->store('public/bukti_uang_pangkal/');

        $santri = auth()->user()->santri;
        $santri->update([
            'status_daftar_ulang' => 1,
            'bukti_uang_pangkal' => $request->file('bukti_uang_pangkal')->hashName(),
        ]);

        return back()->with('berhasil', 'Bukti pembayaran berhasil diupload');
    }
}
