@extends('partials.front')
@section('title', 'UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya')
@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">
                        UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya
                    </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        <i>Meningkatkan produktivitas dan kompetensi tenaga kerja menuju Indonesia yang lebih maju</i>
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('asset/img/upt.png') }}" class="img-fluid" alt="UPT BLP2TK Surabaya" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="content">
                    <h2>Tentang UPT BLP2TK</h2>
                    <p>
                        <b>UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja (BLP2TK) Surabaya</b>
                        adalah unit pelaksana teknis di bawah Dinas Tenaga Kerja yang bertugas memberikan
                        pelatihan, bimbingan, dan pengembangan produktivitas kepada tenaga kerja di wilayah
                        Surabaya dan sekitarnya. Kami berkomitmen untuk meningkatkan kualitas dan kompetensi
                        sumber daya manusia agar mampu bersaing di pasar tenaga kerja nasional maupun global.
                    </p>
                    <div class="text-center text-lg-start">
                        <a href="{{ route('profil-upt') }}"
                            class="btn-get-started d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Profil Kami</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Berita Terbaru ======= -->
        @php
            $beritaTerbaru = \App\Models\Berita::latest()->take(5)->get();
            $slideColors = [
                'linear-gradient(135deg, #1a237e 0%, #0d47a1 50%, #1565c0 100%)',
                'linear-gradient(135deg, #1b5e20 0%, #2e7d32 50%, #388e3c 100%)',
                'linear-gradient(135deg, #4a148c 0%, #6a1b9a 50%, #7b1fa2 100%)',
                'linear-gradient(135deg, #b71c1c 0%, #c62828 50%, #d32f2f 100%)',
                'linear-gradient(135deg, #e65100 0%, #ef6c00 50%, #f57c00 100%)',
            ];
            $slideIcons = ['bi-award-fill', 'bi-people-fill', 'bi-gear-fill', 'bi-building', 'bi-journal-richtext'];
        @endphp

        <section class="py-5" style="background: #f0f4ff;">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Berita Terbaru</p>
                </header>

                @if($beritaTerbaru->count() > 0)

                <!-- Slider Wrapper -->
                <div class="bs-wrapper" id="beritaSliderWrapper">

                    <div class="bs-track" id="beritaTrack">
                        @foreach($beritaTerbaru as $i => $berita)
                        <div class="bs-slide" data-index="{{ $i }}">

                            {{-- Kiri: Gambar atau Placeholder Warna --}}
                            <div class="bs-img-col">
                                @if($berita->foto && file_exists(public_path('images/berita/' . $berita->foto)))
                                    <img src="{{ asset('images/berita/' . $berita->foto) }}"
                                         alt="{{ $berita->judul }}"
                                         class="bs-img">
                                @else
                                    <div class="bs-img-placeholder" style="background: {{ $slideColors[$i % 5] }}">
                                        <i class="bi {{ $slideIcons[$i % 5] }} bs-placeholder-icon"></i>
                                        <span class="bs-placeholder-label">UPT BLP2TK Surabaya</span>
                                    </div>
                                @endif
                            </div>

                            {{-- Kanan: Konten Berita --}}
                            <div class="bs-content-col">
                                <div class="bs-tag">
                                    <i class="bi bi-newspaper me-1"></i> Berita
                                </div>
                                <div class="bs-date">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $berita->created_at->format('d F Y') }}
                                </div>
                                <h3 class="bs-title">{{ $berita->judul }}</h3>
                                <p class="bs-excerpt">
                                    {{ Str::limit(strip_tags($berita->narasi), 200, '...') }}
                                </p>
                                <a href="{{ route('show-blog') }}" class="bs-readmore">
                                    Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    {{-- Navigasi --}}
                    <button class="bs-nav bs-prev" onclick="bsSlide(-1)" aria-label="Sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="bs-nav bs-next" onclick="bsSlide(1)" aria-label="Berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    {{-- Dots --}}
                    <div class="bs-dots">
                        @foreach($beritaTerbaru as $i => $berita)
                            <button class="bs-dot {{ $i === 0 ? 'active' : '' }}"
                                    onclick="bsGoTo({{ $i }})"
                                    aria-label="Slide {{ $i+1 }}"></button>
                        @endforeach
                    </div>

                    {{-- Counter --}}
                    <div class="bs-counter">
                        <span id="bsCurrent">1</span> / {{ $beritaTerbaru->count() }}
                    </div>

                    {{-- Progress bar --}}
                    <div class="bs-progress-bar">
                        <div class="bs-progress-fill" id="bsProgress"></div>
                    </div>

                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('show-blog') }}" class="btn btn-primary px-5 py-2 rounded-pill">
                        <i class="bi bi-collection me-2"></i>Lihat Semua Berita
                    </a>
                </div>

                @else
                <div class="text-center text-muted py-5">
                    <i class="bi bi-newspaper fs-1 d-block mb-2"></i>
                    Belum ada berita tersedia.
                </div>
                @endif
            </div>
        </section>
        <!-- End Berita Terbaru -->

        <style>
        /* ===== BERITA SLIDER ===== */
        .bs-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 50px rgba(0,0,0,0.12);
            background: #fff;
            margin-bottom: 8px;
        }
        .bs-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }
        .bs-slide {
            min-width: 100%;
            display: flex;
            flex-direction: row;
            min-height: 440px;
        }
        /* Kolom gambar */
        .bs-img-col {
            flex: 0 0 48%;
            max-width: 48%;
            overflow: hidden;
        }
        .bs-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .bs-img-placeholder {
            width: 100%;
            height: 100%;
            min-height: 440px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 16px;
        }
        .bs-placeholder-icon {
            font-size: 5rem;
            color: rgba(255,255,255,0.75);
        }
        .bs-placeholder-label {
            color: rgba(255,255,255,0.85);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        /* Kolom konten */
        .bs-content-col {
            flex: 0 0 52%;
            max-width: 52%;
            padding: 48px 48px 56px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
        }
        .bs-tag {
            display: inline-flex;
            align-items: center;
            background: #e8f0fe;
            color: #1a73e8;
            font-size: 12px;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 12px;
            width: fit-content;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .bs-date {
            font-size: 13px;
            color: #888;
            margin-bottom: 14px;
        }
        .bs-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1.35;
            margin-bottom: 16px;
        }
        .bs-excerpt {
            font-size: 0.93rem;
            color: #555;
            line-height: 1.75;
            margin-bottom: 28px;
            flex-grow: 1;
        }
        .bs-readmore {
            display: inline-flex;
            align-items: center;
            background: #0d6efd;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            padding: 11px 28px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.25s;
            width: fit-content;
            box-shadow: 0 4px 16px rgba(13,110,253,0.35);
        }
        .bs-readmore:hover {
            background: #0b5ed7;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(13,110,253,0.45);
        }
        /* Nav buttons */
        .bs-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: none;
            background: #fff;
            color: #333;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            transition: all 0.2s;
        }
        .bs-nav:hover {
            background: #0d6efd;
            color: #fff;
            box-shadow: 0 6px 22px rgba(13,110,253,0.4);
        }
        .bs-prev { left: 16px; }
        .bs-next { right: 16px; }
        /* Dots */
        .bs-dots {
            position: absolute;
            bottom: 18px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 7px;
            z-index: 20;
        }
        .bs-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            border: 2px solid #bbb;
            background: transparent;
            cursor: pointer;
            padding: 0;
            transition: all 0.3s;
        }
        .bs-dot.active {
            background: #0d6efd;
            border-color: #0d6efd;
            transform: scale(1.3);
        }
        /* Counter */
        .bs-counter {
            position: absolute;
            top: 16px;
            right: 20px;
            background: rgba(0,0,0,0.55);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 14px;
            border-radius: 20px;
            z-index: 20;
            letter-spacing: 1px;
        }
        /* Progress bar */
        .bs-progress-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #e0e0e0;
            z-index: 20;
        }
        .bs-progress-fill {
            height: 100%;
            background: #0d6efd;
            width: 0%;
            transition: width 5s linear;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .bs-slide { flex-direction: column; min-height: auto; }
            .bs-img-col, .bs-content-col { flex: 0 0 100%; max-width: 100%; }
            .bs-img-placeholder { min-height: 220px; }
            .bs-content-col { padding: 28px 24px 40px; }
            .bs-title { font-size: 1.1rem; }
            .bs-excerpt { display: none; }
        }
        </style>

        <script>
        (function () {
            const track    = document.getElementById('beritaTrack');
            const dots     = document.querySelectorAll('.bs-dot');
            const elCurr   = document.getElementById('bsCurrent');
            const progress = document.getElementById('bsProgress');
            const total    = dots.length;
            let current = 0, timer, progTimer;

            function goTo(n) {
                current = (n + total) % total;
                track.style.transform = 'translateX(-' + (current * 100) + '%)';
                dots.forEach((d, i) => d.classList.toggle('active', i === current));
                if (elCurr) elCurr.textContent = current + 1;
                startProgress();
            }

            function startProgress() {
                if (progress) {
                    progress.style.transition = 'none';
                    progress.style.width = '0%';
                    void progress.offsetWidth; // reflow
                    progress.style.transition = 'width 5s linear';
                    progress.style.width = '100%';
                }
            }

            function autoPlay() {
                timer = setInterval(() => goTo(current + 1), 5000);
            }

            function reset() { clearInterval(timer); autoPlay(); }

            window.bsSlide = function (d) { goTo(current + d); reset(); };
            window.bsGoTo  = function (n) { goTo(n); reset(); };

            // Swipe
            const wrap = document.getElementById('beritaSliderWrapper');
            if (wrap) {
                let sx = 0;
                wrap.addEventListener('touchstart', e => { sx = e.touches[0].clientX; });
                wrap.addEventListener('touchend',   e => {
                    const dx = sx - e.changedTouches[0].clientX;
                    if (Math.abs(dx) > 40) bsSlide(dx > 0 ? 1 : -1);
                });
            }

            startProgress();
            autoPlay();
        })();
        </script>

    </main>
    <!-- End #main -->

@endsection
