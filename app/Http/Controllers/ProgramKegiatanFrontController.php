<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKegiatan;

class ProgramKegiatanFrontController extends Controller
{
    public function index()
    {
        $programList = ProgramKegiatan::latest()->get();
        return view('front.program-kegiatan', compact('programList'));
    }
}
