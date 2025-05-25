@extends('user.Layouts.main')

@section('container')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Semua Berita<br></h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">About Us<br></li>
                </ol>
            </div>
        </nav> --}}
    </div><!-- End Page Title -->


    <!-- Courses Section -->
    <section id="courses" class="courses section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>News</h2>
            <p>Berita</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                @foreach ($beritas as $item)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch gap-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="{{ asset('img/' . $item->gambar) }}" class="img-fluid"
                                style="height:350px; margin: auto;"alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">{{ date('d-m-Y', strtotime($item->tanggal)) }}</p>
                                    {{-- <p class="price">$169</p> --}}
                                </div>

                                <h3><a href="{{ url('all-berita/' . $item->id) }}" class="d-inline-block text-truncate "
                                        style="width: 350px">{{ $item->judul }}</a></h3>
                                <div class="trainer d-flex justify-content-between align-items-center">

                                    @php

                                        $isi = $item->isi;

                                        if (strlen($item->isi) > 100) {
                                            // $isi = 'UCUP';
                                            $isi = substr($item->isi, 0, 100);
                                            $isi = $isi . '...';
                                        }
                                    @endphp
                                    <p class="description">


                                        {!! $isi !!}</p>
                                    {{-- <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid"
                                            alt="">
                                        <a href="" class="trainer-link">Antonio</a>
                                    </div> --}}
                                    {{-- <div class="trainer-rank d-flex align-items-center">
                                        <i class="bi bi-person user-icon"></i>&nbsp;50
                                        &nbsp;&nbsp;
                                        <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                @endforeach
            </div>

        </div>

    </section><!-- /Courses Section -->
@endsection
