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

        $name = Santri::where([
            'nisn' => request('nisn'),
            'nik' => request('nik'),
            'status_lulus' => 1
        ])->first()?->user->nama;

        if ($name) {
            $status = true;
        }

        return view('informasi.cek-kelulusan', [
            'status' => $status,
            'name' => $name
        ]);
    }
}
