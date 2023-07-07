<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\RiwayatPenyakit;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function detail(Santri $santri)
    {
        return view('santri.detail', compact('santri'));
    }

    public function toggleLulus(Santri $santri)
    {
        $santri->update([
            'status_lulus' => !$santri->status_lulus
        ]);

        return back();
    }

    public function konfirmasiPembayaran(Santri $santri)
    {
        $santri->update([
            'status_pembayaran' => !$santri->status_pembayaran
        ]);

        return back();
    }

    public function edit(Santri $santri)
    {
        return view('santri.edit', compact('santri'));
    }

    public function update(Request $request, Santri $santri)
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
            'foto' => 'nullable|image'
        ]);

        $santri->user()->update([
            'nama' => $request->nama
        ]);

        $fotoSantri = $santri->foto;

        if ($request->has('foto')) {
            $request->file('foto')->store('/public/santri/');
            $fotoSantri = $request->file('foto')->hashName();
        }

        $santri->update([
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
            'foto' => $fotoSantri,
        ]);

        return redirect()->route('santri.detail', $santri)->with('berhasil', 'Data santri berhasil diubah.   ');
    }

    public function destroy(Santri $santri)
    {
        $santri->delete();
        return redirect()->route('dashboard')->with('berhasil', 'Santri berhasil dihapus');
    }

    public function updateOrangtua(Request $request, Santri $santri)
    {
        $request->validate([
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            // 'jalan' => 'required',
            // 'desa' => 'required',
            // 'kecamatan' => 'required',
            // 'kabupaten' => 'required',
            // 'provinsi' => 'required',
            'no_hp' => 'required|numeric',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_ayah' => 'required',
            'pendidikan_ibu' => 'required',
            'penghasilan' => 'required'
        ]);

        $santri->orangTua()->update([
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            // 'jalan' => $request->jalan,
            // 'desa' => $request->desa,
            // 'kecamatan' => $request->kecamatan,
            // 'kabupaten' => $request->kabupaten,
            // 'provinsi' => $request->provinsi,
            'no_hp' => $request->no_hp,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'penghasilan' => $request->penghasilan,
        ]);

        return redirect()->route('santri.detail', $santri)->with('Data orang tua santri berhasil diubah');
    }

    public function updatePendidikan(Request $request, Santri $santri)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'npsn_sekolah' => 'required|numeric',
            'alamat_sekolah' => 'required',
            'no_ijazah' => 'required',
            'tahun_ijazah' => 'required|numeric',
            'nilai_rapor' => 'required',
        ]);


        $santri->pendidikan()->update([
            'nama_sekolah' => $request->nama_sekolah,
            'npsn_sekolah' => $request->npsn_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'no_ijazah' => $request->no_ijazah,
            'tahun_ijazah' => $request->tahun_ijazah,
            'nilai_rapor' => $request->nilai_rapor,
        ]);

        return redirect()->route('santri.detail', $santri)->with('berhasil', 'Data pendidikan santri berhasil diubah.');
    }

    public function storeRiwayatPenyakit(Request $request, Santri $santri)
    {
        $request->validate([
            'nama' => 'required',
            'kondisi' => 'required',
        ]);

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

    public function storePrestasi(Request $request, Santri $santri)
    {
        $request->validate([
            'nama' => 'required',
            'tingkat' => 'required',
            'juara' => 'required',
        ]);

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
