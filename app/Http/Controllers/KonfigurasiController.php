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

        return view('admin.pengumuman', compact('pengumuman'));
    }

    public function profil()
    {
        $profil = SiteMeta::where('name', 'profil')->first()?->value;

        return view('admin.profil', compact('profil'));
    }

    public function update(Request $request)
    {
        // $path = 'public/meta/';

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
                    'pengumuman' => 'required'
                ]);

                SiteMeta::updateOrCreate(['name' => 'pengumuman'], [
                    'value' => $request->pengumuman
                ]);

                $message = 'Pengumuman berhasil diubah.';
                break;

            case 'profil':
                $request->validate([
                    'profil' => 'required'
                ]);

                SiteMeta::updateOrCreate(['name' => 'profil'], [
                    'value' => $request->profil
                ]);

                $message = 'Profil berhasil diubah.';
                break;

            default:
                $message = 'UNDEFINED';
                break;
        }

        return back()->with('berhasil', $message);
    }
}
