<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::orderBy('urutan')->get();
        return view('admin.pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string',
            'jabatan' => 'required|string',
            'foto'    => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = 'pegawai_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pegawai'), $filename);
        }

        Pegawai::create([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'urutan'  => $request->urutan ?? 0,
            'foto'    => $filename,
        ]);

        return redirect()->route('admin.pegawai.index')->with('toast_success', 'Data pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pegawai::findOrFail($id);
        return view('admin.pegawai.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pegawai::findOrFail($id);
        $request->validate([
            'nama'    => 'required|string',
            'jabatan' => 'required|string',
            'foto'    => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('images/pegawai/' . $data->foto))) {
                unlink(public_path('images/pegawai/' . $data->foto));
            }
            $file     = $request->file('foto');
            $filename = 'pegawai_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pegawai'), $filename);
            $data->foto = $filename;
        }

        $data->update([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'urutan'  => $request->urutan ?? $data->urutan,
        ]);

        if ($request->hasFile('foto')) $data->save();

        return redirect()->route('admin.pegawai.index')->with('toast_success', 'Data pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        if ($data->foto && file_exists(public_path('images/pegawai/' . $data->foto))) {
            unlink(public_path('images/pegawai/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('admin.pegawai.index')->with('toast_success', 'Data pegawai berhasil dihapus');
    }
}
