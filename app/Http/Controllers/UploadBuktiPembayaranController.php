<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadBuktiPembayaranController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|max:2048'
        ]);

        $request->file('bukti_pembayaran')->store('public/bukti_pembayaran/');

        $santri = auth()->user()->santri;
        $santri->update([
            'bukti_pembayaran' => $request->file('bukti_pembayaran')->hashName()
        ]);

        return back()->with('berhasil', 'Bukti pembayaran berhasil diupload');
    }
}
