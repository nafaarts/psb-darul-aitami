<?php

namespace App\Http\Controllers;

use App\Models\SiteMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KonfigurasiController extends Controller
{
    public function index()
    {
        $data['status-pendaftaran'] = SiteMeta::where('name', 'status-pendaftaran')->first()?->value ?? false;
        $data['pengumuman-pendaftaran'] = SiteMeta::where('name', 'pengumuman-pendaftaran')->first()?->value;
        $data['alur-pendaftaran'] = SiteMeta::where('name', 'alur-pendaftaran')->first()?->value;
        $data['informasi-biaya'] = SiteMeta::where('name', 'informasi-biaya')->first()?->value;
        $data['pengumuman-kelulusan'] = SiteMeta::where('name', 'pengumuman-kelulusan')->first()?->value;

        return view('admin.konfigurasi', compact('data'));
    }

    public function pengumuman()
    {
        $pengumuman = SiteMeta::where('name', 'pengumuman')->first()?->value;
        $pengumuman_image = SiteMeta::where('name', 'pengumuman_image')->first();
        $pengumuman_file = SiteMeta::where('name', 'pengumuman_file')->first();

        return view('admin.pengumuman', compact('pengumuman', 'pengumuman_image', 'pengumuman_file'));
    }

    public function profil()
    {
        $profil = SiteMeta::where('name', 'profil')->first()?->value;

        $profil_image = SiteMeta::where('name', 'profil_image')->first();
        $profil_file = SiteMeta::where('name', 'profil_file')->first();

        return view('admin.profil', compact('profil', 'profil_image', 'profil_file'));
    }

    public function peringatanPembayaran()
    {
        $peringatan_pembayaran = SiteMeta::where('name', 'peringatan_pembayaran')->first()?->value;

        return view('admin.peringatan-pembayaran', compact('peringatan_pembayaran'));
    }

    public function update(Request $request)
    {

        switch ($request->type) {
            case 'status-pendaftaran':
                $old = SiteMeta::where('name', 'status-pendaftaran')->first();

                SiteMeta::updateOrCreate(['name' => 'status-pendaftaran'], [
                    'value' => !$old?->value ?? true
                ]);

                $message = 'Status Pendaftaran berhasil diubah.';
                break;

            case 'pengumuman':
                $request->validate([
                    'pengumuman' => 'required',
                    'pengumuman_file' => 'nullable',
                    'pengumuman_image' => 'nullable|image'
                ]);

                SiteMeta::updateOrCreate(['name' => 'pengumuman'], [
                    'value' => $request->pengumuman
                ]);

                if ($request->file('pengumuman_file')) {
                    $request->file('pengumuman_file')->store('public/meta');
                    SiteMeta::updateOrCreate(['name' => 'pengumuman_file'], [
                        'value' => $request->file('pengumuman_file')->hashName()
                    ]);
                }

                if ($request->file('pengumuman_image')) {
                    $request->file('pengumuman_image')->store('public/meta');
                    SiteMeta::updateOrCreate(['name' => 'pengumuman_image'], [
                        'value' => $request->file('pengumuman_image')->hashName()
                    ]);
                }

                $message = 'Pengumuman berhasil diubah.';
                break;

            case 'profil':
                $request->validate([
                    'profil' => 'required',
                    'profil_file' => 'nullable',
                    'profil_image' => 'nullable|image'
                ]);

                SiteMeta::updateOrCreate(['name' => 'profil'], [
                    'value' => $request->profil
                ]);

                if ($request->file('profil_file')) {
                    $request->file('profil_file')->store('public/meta');

                    SiteMeta::updateOrCreate(['name' => 'profil_file'], [
                        'value' => $request->file('profil_file')->hashName()
                    ]);
                }

                if ($request->file('profil_image')) {
                    $request->file('profil_image')->store('public/meta');

                    SiteMeta::updateOrCreate(['name' => 'profil_image'], [
                        'value' => $request->file('profil_image')->hashName()
                    ]);
                }

                $message = 'Profil berhasil diubah.';
                break;

            case 'peringatan_pembayaran':
                $request->validate([
                    'peringatan_pembayaran' => 'required',
                ]);

                SiteMeta::updateOrCreate(['name' => 'peringatan_pembayaran'], [
                    'value' => $request->peringatan_pembayaran
                ]);

                $message = 'peringatan pembayaran berhasil diubah.';
                break;

            default:
                $message = 'UNDEFINED';
                break;
        }

        return back()->with('berhasil', $message);
    }

    public function removeMetaFile(SiteMeta $sitemeta)
    {
        File::delete(storage_path('app/public/meta/' . $sitemeta->value));

        $sitemeta->delete();

        return back()->with('berhasil', 'berhasil dihapus');
    }
}
