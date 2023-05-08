<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class KartuUjianController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $santri  = Santri::where('user_id', auth()->id())->first();

        // $logo = self::convertImageToBase64(public_path('/logo.png')); // convert logo
        $fotoSantri = self::convertImageToBase64(storage_path('app/public/santri/' . $santri->foto));

        // return view('pendaftaran.kartu-ujian', compact('fotoSantri', 'santri')); // sample
        $pdf = PDF::loadView('pendaftaran.kartu-ujian', compact('fotoSantri', 'santri'));

        return $pdf->download('kartu-ujian.pdf');
    }

    private function convertImageToBase64($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}