<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilUpt;
use Illuminate\Http\Request;

class ProfilUptController extends Controller
{
    public function index()
    {
        $data = ProfilUpt::firstOrCreate(['id' => 1]);
        return view('admin.profil-upt.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = ProfilUpt::firstOrCreate(['id' => 1]);

        $data->tugas_fungsi = $request->tugas_fungsi;
        $data->visi         = $request->visi;
        $data->misi         = $request->misi;

        if ($request->hasFile('foto_struktur')) {
            $request->validate(['foto_struktur' => 'image|mimes:png,jpg,jpeg|max:5120']);
            if ($data->foto_struktur && file_exists(public_path('images/profil/' . $data->foto_struktur))) {
                unlink(public_path('images/profil/' . $data->foto_struktur));
            }
            $file = $request->file('foto_struktur');
            $filename = 'struktur_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profil'), $filename);
            $data->foto_struktur = $filename;
        }

        $data->save();
        return redirect()->route('admin.profil-upt.index')->with('toast_success', 'Profil UPT berhasil diperbarui');
    }
}
