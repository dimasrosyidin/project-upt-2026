@extends('partials.front')
@section('title', 'Baca Berita | UPT BLP2TK Surabaya')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('beranda') }}">Home</a></li>
                    <li><a href="{{ route('show-blog') }}">Blog</a></li>
                    <li>Read Article</li>
                </ol>
                <h2>Read Article </h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">
                            <h2 class="entry-title">
                                <a href="#">{{ $data->judul }}</a>
                            </h2>

                            <div class="entry-meta">
                                @php
                                    $dateString = $data->tanggal;
                                    $tanggal = strftime('%d %B %Y', strtotime($dateString));
                                @endphp
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="blog-single.html">{{ $data->penulis }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time
                                                datetime="2020-01-01">{{ $tanggal }}</time></a></li>
                                </ul>
                            </div>
                            <div id="share"></div>
                            <div class="entry-content">
                                <img src="{{ asset('images/blog/' . $data->file) }}" style="width: 100%;height:100%"
                                    class="img-fluid" alt="">
                                <p>
                                    {!! $data->konten !!}
                                </p>
                            </div>
                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">
                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @forelse ($recent as $item)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('images/blog/' . $item->file) }}" alt="">
                                        <h4><a href="{{ $item->slug }}">{{ $item->judul }}</a></h4>
                                        <time datetime="">{{ $item->created_at->diffForhumans() }}</time>
                                    </div>
                                @empty
                                    <div class="alert alert-primary" role="alert">
                                        article not available
                                    </div>
                                @endforelse
                            </div><!-- End sidebar recent posts-->
                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->
@endsection
