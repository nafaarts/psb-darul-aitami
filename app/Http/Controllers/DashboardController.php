<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\SiteMeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $jumlahDaftarUlang = Santri::where('status_daftar_ulang', true)->count();

        $santri = Santri::when(request('cari'),  function ($query) {
            $query->whereHas('user', function ($query) {
                return $query->where('nama', 'LIKE', '%' . request('cari') . '%');
            })
                ->orWhere('no_daftar', 'LIKE', '%' . request('cari') . '%')
                ->orWhere('nik', 'LIKE', '%' . request('cari') . '%')
                ->orWhere('nisn', 'LIKE', '%' . request('cari') . '%');
        })
            ->whereNot('status_lulus', 1)
            ->whereNot('status_daftar_ulang', 1)
            ->latest()
            ->paginate(15);

        $data['status-pendaftaran'] = SiteMeta::where('name', 'status-pendaftaran')->first()?->value ?? false;

        return view('admin.dashboard', compact('jumlahPendaftar', 'jumlahSantriwati', 'jumlahSantriwan', 'jumlahLulus', 'jumlahDaftarUlang', 'santri', 'data'));
    }

    public function santri()
    {
        $santri = Santri::when(request('cari'), function ($query) {
            $query->where(function ($query) {
                $query->orWhere('no_daftar', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('nik', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('nisn', 'LIKE', '%' . request('cari') . '%')
                    ->orWhereHas('user', function ($query) {
                        return $query->where('nama', 'LIKE', '%' . request('cari') . '%');
                    });
            });
        })
            ->whereNot('status_daftar_ulang', 0)
            ->latest()
            ->paginate();

        return view('santri.santri', ['santri' => $santri]);
    }

    public function santriLulus()
    {
        $santri = Santri::when(request('cari'), function ($query) {
            $query->where(function ($query) {
                $query->orWhere('no_daftar', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('nik', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('nisn', 'LIKE', '%' . request('cari') . '%')
                    ->orWhereHas('user', function ($query) {
                        return $query->where('nama', 'LIKE', '%' . request('cari') . '%');
                    });
            });
        })
            ->when(request('filter') == 'BELUM_DIKONFIRMASI', function ($query) {
                $query->where(function ($query) {
                    $query->whereNotNull('bukti_uang_pangkal')
                        ->whereNotNull('ijazah')
                        ->whereNotNull('kartu_keluarga')
                        ->whereNotNull('ukuran_baju_olahraga')
                        ->where('status_daftar_ulang', false);
                });
            })
            ->when(request('filter') == 'SUDAH_DIKONFIRMASI', function ($query) {
                $query->where(function ($query) {
                    $query->where('status_daftar_ulang', true);
                });
            })
            ->whereNot('status_lulus', 0)
            ->latest()
            ->paginate();

        return view('santri.santri-lulus', ['santri' => $santri]);
    }
}
