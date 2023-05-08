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

    public function update(Request $request)
    {
        $path = 'public/meta/';

        switch ($request->type) {
            case 'status-pendaftaran':
                $old = SiteMeta::where('name', 'status-pendaftaran')->first();

                SiteMeta::updateOrCreate(['name' => 'status-pendaftaran'], [
                    'value' => !$old?->value ?? true
                ]);

                $message = 'Status Pendaftaran berhasil diubah.';
                break;

            case 'pengumuman-pendaftaran':
                $request->validate([
                    'pengumuman-pendaftaran' => 'required|mimes:pdf'
                ]);

                $old = SiteMeta::where('name', 'pengumuman-pendaftaran')->first();
                if ($old) { File::delete($old->value); }

                $request->file('pengumuman-pendaftaran')->store($path);

                SiteMeta::updateOrCreate(['name' => 'pengumuman-pendaftaran'], [
                    'value' => $request->file('pengumuman-pendaftaran')->hashName('storage/meta/')
                ]);

                $message = 'Pengumuman Pendaftaran berhasil diubah.';
                break;

            case 'alur-pendaftaran':
                $request->validate([
                    'alur-pendaftaran' => 'required|image'
                ]);

                $old = SiteMeta::where('name', 'alur-pendaftaran')->first();
                if ($old) { File::delete($old->value); }

                $request->file('alur-pendaftaran')->store($path);

                SiteMeta::updateOrCreate(['name' => 'alur-pendaftaran'], [
                    'value' => $request->file('alur-pendaftaran')->hashName('storage/meta/')
                ]);

                $message = 'Alur Pendaftar berhasil diubah.';
                break;

            case 'informasi-biaya':
                $request->validate([
                    'informasi-biaya' => 'required|mimes:pdf'
                ]);

                $old = SiteMeta::where('name', 'informasi-biaya')->first();
                if ($old) { File::delete($old->value); }

                $request->file('informasi-biaya')->store($path);

                SiteMeta::updateOrCreate(['name' => 'informasi-biaya'], [
                    'value' => $request->file('informasi-biaya')->hashName('storage/meta/')
                ]);

                $message = 'Informasi Biaya berhasil diubah.';
                break;

            case 'pengumuman-kelulusan':
                $request->validate([
                    'pengumuman-kelulusan' => 'required|mimes:pdf'
                ]);

                $old = SiteMeta::where('name', 'pengumuman-kelulusan')->first();
                if ($old) { File::delete($old->value); }

                $request->file('pengumuman-kelulusan')->store($path);

                SiteMeta::updateOrCreate(['name' => 'pengumuman-kelulusan'], [
                    'value' => $request->file('pengumuman-kelulusan')->hashName('storage/meta/')
                ]);

                $message = 'Pengumuman Kelulusan berhasil diubah.';
                break;

            default:
                $message = 'UNDEFINED';
                break;
        }

        return back()->with('berhasil', $message);
    }
}