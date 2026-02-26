<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilUpt;
use App\Models\Pegawai;

class ProfilUptFrontController extends Controller
{
    public function index()
    {
        $profil      = ProfilUpt::first();
        $pegawaiList = Pegawai::orderBy('urutan')->get();
        return view('front.profil-upt', compact('profil', 'pegawaiList'));
    }

    public function struktur()
    {
        $profil = ProfilUpt::first();
        return view('front.profil.struktur', compact('profil'));
    }

    public function tugas()
    {
        $profil = ProfilUpt::first();
        return view('front.profil.tugas', compact('profil'));
    }

    public function visimisi()
    {
        $profil = ProfilUpt::first();
        return view('front.profil.visimisi', compact('profil'));
    }

    public function pegawai()
    {
        $pegawaiList = Pegawai::orderBy('urutan')->get();
        return view('front.profil.pegawai', compact('pegawaiList'));
    }
}
