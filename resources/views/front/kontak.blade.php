@extends('partials.front')
@section('title', 'Kontak Kami - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    <!-- Page Title -->
    <section class="py-4 bg-light border-bottom">
        <div class="container">
            <h3 class="fw-bold mb-0">Kontak Kami</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Kontak Kami</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ======= Kontak ======= -->
    <section class="contact py-5">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Hubungi UPT BLP2TK Surabaya</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p>Jl. Bendul Merisi No.2, Jagir, Kec. Wonokromo,<br>Surabaya, Jawa Timur 60244</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Telepon</h3>
                                <p><a href="tel:+6231841526">(031) 8415260</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p><a href="mailto:uptblp2tksurabaya@gmail.com">uptblp2tksurabaya@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Jam Kerja</h3>
                                <p>Senin – Jumat<br>07.30 – 16.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ratio ratio-4x3 rounded overflow-hidden shadow-sm">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7!2d112.7350!3d-7.3150!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTgnNTQuMCJTIDExMsKwNDQnMDYuMCJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
