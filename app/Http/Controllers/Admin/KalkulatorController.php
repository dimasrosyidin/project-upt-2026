<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kalkulator;
use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        $data = Kalkulator::latest()->get();
        return view('admin.kalkulator.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kalkulator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pt'      => 'required|string',
            'alamat_pt'    => 'required|string',
            'tenaga_kerja' => 'required|integer|min:1',
        ]);

        $omzet = [];
        for ($i = 1; $i <= 12; $i++) {
            $omzet["omzet_{$i}"] = (float) ($request->input("omzet_{$i}") ?? 0);
        }

        Kalkulator::create(array_merge($request->only(['nama_pt','alamat_pt','tenaga_kerja']), $omzet));

        return redirect()->route('admin.kalkulator.index')->with('toast_success', 'Data kalkulator berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kalkulator::findOrFail($id);
        return view('admin.kalkulator.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kalkulator::findOrFail($id);
        $request->validate([
            'nama_pt'      => 'required|string',
            'alamat_pt'    => 'required|string',
            'tenaga_kerja' => 'required|integer|min:1',
        ]);

        $omzet = [];
        for ($i = 1; $i <= 12; $i++) {
            $omzet["omzet_{$i}"] = (float) ($request->input("omzet_{$i}") ?? 0);
        }

        $data->update(array_merge($request->only(['nama_pt','alamat_pt','tenaga_kerja']), $omzet));

        return redirect()->route('admin.kalkulator.index')->with('toast_success', 'Data kalkulator berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kalkulator::findOrFail($id)->delete();
        return redirect()->route('admin.kalkulator.index')->with('toast_success', 'Data kalkulator berhasil dihapus');
    }
}
