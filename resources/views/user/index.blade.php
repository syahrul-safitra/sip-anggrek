@extends('user.Layouts.main')

@section('container')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('user/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="100">Kesehatan Anak<br>Dimulai Rutin Dari Kunjungan Ke Posyandu
            </h2>
            <p data-aos="fade-up" data-aos-delay="200">Sumber Informasi Perawatan Terpercaya Untuk Si Bayi</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="courses.html" class="btn-get-started">Get Started</a>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('user/assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Voluptatem dignissimos provident quasi corporis</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in
                                voluptate velit.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                    </ul>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahAnak }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Anak Yang Terdata</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $imunisasiTahunIni }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Anak Yang Imunisasi Tahun Ini</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $tumbuhKABI }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Pengecak Tumbuh Kembang Anak Bulan Ini</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $tumbuhKA }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Jumlah Pengecekan Tumbuh Kembang Anak Tahun Ini</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Counts Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">

        <div class="container">

            <div class="row gy-4">

                {{-- <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box">
                        <h3>Why Choose Our Products?</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                            optio ad corporis.
                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn"><span>Learn More</span> <i
                                    class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box --> --}}

                {{-- <div class="col-lg-12 d-flex align-items-center"> --}}
                <div class="row gy-4 flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($jadwals as $item)
                        <div class="col-lg-2" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                {{-- <i class="bi bi-gem"></i> --}}
                                <i class="bi bi-calendar-check"></i>
                                <h4>{{ $item->hari }}</h4>
                                <p>{{ $item->jam }}</p>
                            </div>
                        </div><!-- End Icon Box -->
                    @endforeach

                    {{-- <div class="col-xl-3">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <h4>Senin</h4>
                                <p>Consequuntur sunt aut quasi enim aliquam </p>
                            </div>
                        </div><!-- End Icon Box --> --}}




                    {{-- <div class="col-xl-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-inboxes"></i>
                                <h4>Labore consequatur incidid dolore</h4>
                                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                </p>
                            </div>
                        </div><!-- End Icon Box --> --}}

                    {{-- </div> --}}
                </div>

            </div>

        </div>

    </section><!-- /Why Us Section -->


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
                            <img src="{{ asset('img/' . $item->gambar) }}" class="img-fluid" style="height:400px"
                                alt="...">
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

    <!-- Trainers Index Section -->
    <section id="trainers-index" class="section trainers-index">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kader</h2>
            <p>Anggota Posyandu</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                @foreach ($anggotas as $item)
                    <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{ asset('img/' . $item->foto) }}" class="img-fluid " alt="">
                            <div class="member-content">
                                <h4>{{ $item->nama }}</h4>
                                <span>{{ $item->no_telpon }}</span>
                                <p>
                                    {{ $item->alamat }}
                                </p>
                                {{-- <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach

            </div>

        </div>

    </section><!-- /Trainers Index Section -->
@endsection
