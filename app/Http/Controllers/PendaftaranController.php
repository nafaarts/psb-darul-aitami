<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\Pendidikan;
use App\Models\Prestasi;
use App\Models\RiwayatPenyakit;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PendaftaranController extends Controller
{
    public function pendaftaran()
    {
        $santri = Santri::where('user_id', auth()->id())->first();

        if (!request('step')) {
            $step = 'riwayat-penyakit';

            if (!$santri?->pendidikan) {
                $step = 'pendidikan';
            }

            if (!$santri?->orangTua) {
                $step = 'orangtua';
            }

            if (!$santri) {
                $step = 'data-diri';
            }

            return redirect()->route('pendaftaran', ['step' => $step]);
        }

        switch (request('step')) {
            case 'data-diri':
                $view = view('pendaftaran.index', compact('santri'));
                break;

            case 'orangtua':
                $orangTua = $santri?->orangTua;
                $view = view('pendaftaran.orangtua', compact('orangTua'));
                break;

            case 'pendidikan':
                $pendidikan = $santri?->pendidikan;
                $view = view('pendaftaran.pendidikan', compact('pendidikan'));
                break;

            case 'prestasi':
                $prestasi = $santri?->prestasi;
                $view = view('pendaftaran.prestasi', compact('prestasi'));
                break;

            case 'riwayat-penyakit':
                $riwayatPenyakit = $santri?->riwayatPenyakit;
                $view = view('pendaftaran.riwayat-penyakit', compact('riwayatPenyakit'));
                break;

            default:
                abort(404);
                break;
        }

        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required|numeric',
            'dari_bersaudara' => 'required|numeric',
            'golongan_darah' => 'required',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'buta_warna' => 'required',
            'status_anak' => 'required',
            'foto' => ['image', 'max:2048', Rule::requiredIf(!Santri::where('user_id', auth()->id())->exists())]
        ]);

        User::findOrFail(auth()->id())->update([
            'nama' => $request->nama
        ]);

        if ($request->has('foto')) {
            $request->file('foto')->store('/public/santri/');
        }

        $noDaftar = 'PSB-' . str_pad((Santri::latest()->first()->id ?? 0) + 1, 4, '0', STR_PAD_LEFT);

        Santri::updateOrCreate([
            'user_id' => auth()->id(),
        ], [
            'no_daftar' => $noDaftar,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'anak_ke' => $request->anak_ke,
            'dari_bersaudara' => $request->dari_bersaudara,
            'golongan_darah' => $request->golongan_darah,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'buta_warna' => $request->buta_warna,
            'status_anak' => $request->status_anak,
            'foto' => $request->has('foto') ? $request->file('foto')->hashName() : auth()->user()->santri->foto,
        ]);

        return redirect()->route('pendaftaran', ['step' => 'orangtua']);
    }

    public function storeOrangTua(Request $request)
    {
        $request->validate([
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            // 'jalan' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'no_hp' => 'required|numeric',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_ayah' => 'required',
            'pendidikan_ibu' => 'required',
            'penghasilan' => 'required'
        ]);

        $santri = Santri::where('user_id', auth()->id())->first();

        if (!$santri) {
            return redirect()->route('pendaftaran', ['step' => 'data-diri']);
        }

        OrangTua::updateOrCreate([
            'santri_id' => $santri->id
        ], [
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            // 'jalan' => $request->jalan,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'no_hp' => $request->no_hp,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'penghasilan' => $request->penghasilan,
        ]);

        return redirect()->route('pendaftaran', ['step' => 'pendidikan']);
    }

    public function storePendidikan(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'npsn_sekolah' => 'required|numeric',
            'alamat_sekolah' => 'required',
            'no_ijazah' => 'required',
            'tahun_ijazah' => 'required|numeric',
            'nilai_rapor' => 'required',
        ]);

        $santri = Santri::where('user_id', auth()->id())->first();

        if (!$santri) {
            return redirect()->route('pendaftaran', ['step' => 'data-diri']);
        }

        Pendidikan::updateOrCreate([
            'santri_id' => $santri->id
        ], [
            'nama_sekolah' => $request->nama_sekolah,
            'npsn_sekolah' => $request->npsn_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'no_ijazah' => $request->no_ijazah,
            'tahun_ijazah' => $request->tahun_ijazah,
            'nilai_rapor' => $request->nilai_rapor,
        ]);

        return redirect()->route('pendaftaran', ['step' => 'riwayat-penyakit']);
    }

    public function storeRiwayatPenyakit(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kondisi' => 'required',
        ]);

        $santri = Santri::where('user_id', auth()->id())->first();

        if (!$santri) {
            return redirect()->route('pendaftaran', ['step' => 'data-diri']);
        }

        $santri->riwayatPenyakit()->create([
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
        ]);

        return back();
    }

    public function destroyRiwayatPenyakit(RiwayatPenyakit $riwayatpenyakit)
    {
        $riwayatpenyakit->delete();

        return back();
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tingkat' => 'required',
            'juara' => 'required',
        ]);

        $santri = Santri::where('user_id', auth()->id())->first();

        if (!$santri) {
            return redirect()->route('pendaftaran', ['step' => 'data-diri']);
        }

        $santri->prestasi()->create([
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
            'juara' => $request->juara,
        ]);

        return back();
    }

    public function destroyPrestasi(Prestasi $prestasi)
    {
        $prestasi->delete();

        return back();
    }
}
