<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilUpt;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        $profil      = ProfilUpt::first();
        $beritaList  = Berita::latest()->take(3)->get();
        $totalBerita = Berita::count();

        return view('admin.dashboard.index', compact('profil', 'beritaList', 'totalBerita'));
    }
}
