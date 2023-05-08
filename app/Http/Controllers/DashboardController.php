<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahPendaftar = Santri::count();
        $jumlahSantriwati = Santri::where('jenis_kelamin', 'P')->count();
        $jumlahSantriwan = Santri::where('jenis_kelamin', 'L')->count();
        $jumlahLulus = Santri::where('status_lulus', true)->count();

        $santri = Santri::latest()
            ->whereHas('user', function ($query) {
                return $query->where('nama', 'LIKE', '%' . request('cari') . '%');
            })
            ->orWhere('no_daftar', 'LIKE', '%' . request('cari') . '%')
            ->orWhere('nik', 'LIKE', '%' . request('cari') . '%')
            ->orWhere('nisn', 'LIKE', '%' . request('cari') . '%')
            ->paginate(15);

        return view('admin.dashboard', compact('jumlahPendaftar', 'jumlahSantriwati', 'jumlahSantriwan', 'jumlahLulus', 'santri'));
    }
}