@extends('partials.front')
@section('title', 'Profil UPT - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    <!-- Page Title -->
    <section class="py-4 bg-light border-bottom">
        <div class="container">
            <h3 class="fw-bold mb-0">Profil UPT BLP2TK</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Profil UPT</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ======= Struktur Organisasi ======= -->
    <section id="struktur" class="py-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Struktur Organisasi</p>
            </header>
            <div class="text-center">
                @if($profil && $profil->foto_struktur)
                    <img src="{{ asset('images/profil/' . $profil->foto_struktur) }}"
                         class="img-fluid rounded shadow"
                         style="max-width:900px;"
                         alt="Struktur Organisasi UPT BLP2TK">
                @else
                    <div class="alert alert-info d-inline-block px-5">
                        <i class="bi bi-diagram-3 fs-1 d-block mb-2"></i>
                        Gambar struktur organisasi belum tersedia.
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- ======= Tugas dan Fungsi ======= -->
    <section id="tugas" class="py-5 bg-light">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Tugas dan Fungsi</p>
            </header>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm p-4 p-md-5">
                        <p class="text-muted" style="white-space: pre-line; font-size:15px; line-height:1.8;">
                            {{ $profil ? $profil->tugas_fungsi : 'Data belum tersedia.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Visi dan Misi ======= -->
    <section id="visimisi" class="py-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Visi dan Misi</p>
            </header>
            <div class="row gy-4 justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 p-md-5 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                 style="width:48px;height:48px;flex-shrink:0;">
                                <i class="bi bi-eye text-white fs-5"></i>
                            </div>
                            <h5 class="fw-bold mb-0 text-primary">Visi</h5>
                        </div>
                        <p class="text-muted" style="white-space: pre-line; line-height:1.8;">
                            {{ $profil ? $profil->visi : 'Data belum tersedia.' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 p-md-5 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                                 style="width:48px;height:48px;flex-shrink:0;">
                                <i class="bi bi-list-check text-white fs-5"></i>
                            </div>
                            <h5 class="fw-bold mb-0 text-success">Misi</h5>
                        </div>
                        <p class="text-muted" style="white-space: pre-line; line-height:1.8;">
                            {{ $profil ? $profil->misi : 'Data belum tersedia.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Profil Pegawai ======= -->
    <section id="pegawai" class="py-5 bg-light">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Profil Pegawai</p>
            </header>
            @if($pegawaiList->count())
                <div class="row gy-4 justify-content-center">
                    @foreach($pegawaiList as $pgw)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 text-center" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 50 }}">
                        @if($pgw->foto)
                            <img src="{{ asset('images/pegawai/' . $pgw->foto) }}"
                                 class="rounded-circle mb-2 shadow"
                                 style="width:90px;height:90px;object-fit:cover;"
                                 alt="{{ $pgw->nama }}">
                        @else
                            <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-2 shadow"
                                 style="width:90px;height:90px;">
                                <i class="bi bi-person fs-2 text-white"></i>
                            </div>
                        @endif
                        <p class="fw-bold mb-0" style="font-size:13px;">{{ $pgw->nama }}</p>
                        <p class="text-muted" style="font-size:12px;">{{ $pgw->jabatan }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-muted py-4">
                    <i class="bi bi-people fs-1 d-block mb-2"></i>
                    Data pegawai belum tersedia.
                </div>
            @endif
        </div>
    </section>

</main>
@endsection
