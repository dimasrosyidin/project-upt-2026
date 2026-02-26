@extends('partials.front')
@section('title', 'Berita | UPT BLP2TK Surabaya')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Blog</li>
                </ol>
                <h2>Blog</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-12 entries">
                        @forelse ($data as $item)
                            <!--blog entry -->
                            <article class="entry">
                                <div class="entry-img">
                                    <img src="{{ asset('images/blog/' . $item->file) }}" style="width: 100%;height:100%"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="entry-title">
                                    <a href="read-blog/{{ $item->slug }}">{{ $item->judul }}</a>
                                </h2>
                                <div class="entry-meta">
                                    @php
                                        $dateString = $item->tanggal;
                                        $tanggal = strftime('%d %B %Y', strtotime($dateString));
                                    @endphp
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-single.html">{{ $item->penulis }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-single.html"><time
                                                    datetime="2020-01-01">{{ $tanggal }}</time></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p>
                                        {{ Str::limit(Strip_tags($item['konten']), 300, '...') }}
                                    </p>
                                    <div class="read-more">
                                        <a href="read-blog/{{ $item->slug }}">Read More</a>
                                    </div>
                                </div>
                            </article>
                            <!-- End blog entry -->
                        @empty
                            <div class="alert alert-primary" role="alert">
                                article not available
                            </div>
                        @endforelse
                    </div><!-- End blog entries list -->
                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
