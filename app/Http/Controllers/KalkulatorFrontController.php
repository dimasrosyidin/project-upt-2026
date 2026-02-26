<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalkulator;

class KalkulatorFrontController extends Controller
{
    public function index()
    {
        $kalkulatorList = Kalkulator::orderBy('nama_pt')->get();
        return view('front.kalkulator', compact('kalkulatorList'));
    }
}
