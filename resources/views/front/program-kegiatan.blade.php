@extends('partials.front')
@section('title', 'Program Kegiatan - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    <!-- Page Title -->
    <section class="py-4 bg-light border-bottom">
        <div class="container">
            <h3 class="fw-bold mb-0">Program Kegiatan</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Program Kegiatan</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ======= Program Kegiatan ======= -->
    <section class="py-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Program Kegiatan UPT BLP2TK</p>
            </header>
            <div class="row gy-4">
                @forelse($programList as $program)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($program->foto)
                            <img src="{{ asset('images/program/' . $program->foto) }}"
                                 class="card-img-top" style="height:210px;object-fit:cover;"
                                 alt="{{ $program->nama_kegiatan }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:210px;">
                                <i class="bi bi-calendar-event fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $program->nama_kegiatan }}</h5>
                            <p class="card-text text-muted" style="font-size:14px; line-height:1.7;">
                                {{ strip_tags($program->narasi) }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-calendar-x fs-1 d-block mb-3"></i>
                    <p>Belum ada program kegiatan yang tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</main>
@endsection
