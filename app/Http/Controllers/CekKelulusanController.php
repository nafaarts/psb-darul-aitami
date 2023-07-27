<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class CekKelulusanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $status = false;

        $santri = Santri::where([
            'nisn' => request('nisn'),
            'no_daftar' => request('no_daftar'),
        ])->first();

        // status : 1 - lulus | 2 - tidak lulus | 3 - data tidak ditemukan
        if ($santri) {
            $status = $santri->status_lulus ? 1 : 2;
        } else {
            $status = 3;
        }

        return view('informasi.cek-kelulusan', [
            'status' => $status,
            'name' => $santri?->user?->nama
        ]);
    }
}
