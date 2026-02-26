<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::latest()->get();
        return view('admin.berita.index', compact('data'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string',
            'narasi' => 'required|string',
            'foto'   => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = 'berita_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);
        }

        Berita::create([
            'judul'  => $request->judul,
            'narasi' => $request->narasi,
            'foto'   => $filename,
        ]);

        return redirect()->route('admin.berita.index')->with('toast_success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Berita::findOrFail($id);
        $request->validate([
            'judul'  => 'required|string',
            'narasi' => 'required|string',
            'foto'   => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('images/berita/' . $data->foto))) {
                unlink(public_path('images/berita/' . $data->foto));
            }
            $file     = $request->file('foto');
            $filename = 'berita_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $filename);
            $data->foto = $filename;
        }

        $data->update(['judul' => $request->judul, 'narasi' => $request->narasi]);
        if ($request->hasFile('foto')) $data->save();

        return redirect()->route('admin.berita.index')->with('toast_success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Berita::findOrFail($id);
        if ($data->foto && file_exists(public_path('images/berita/' . $data->foto))) {
            unlink(public_path('images/berita/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('admin.berita.index')->with('toast_success', 'Berita berhasil dihapus');
    }
}
