@extends('user.Layouts.main')

@section('container')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Data Tumbuh Kembang Anak<br></h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">

                {{-- Tumbuh Kembang Anak --}}


                <div class="form-group mb-3">

                    <form class="d-flex gap-5" action="" method="GET">
                        <div class="w-75">
                            <input type="text" name="kode"
                                class="form-control input-default @error('kode')
                            is-invalid
                        @enderror"
                                value="{{ @old('kode') }}" placeholder="Kode Anak">

                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Cari</button>

                    </form>
                </div>


                @if ($show)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Berat Badan Tahun
                                        {{ date('Y') }}
                                    </h6>
                                </div>

                                <canvas id="beratChart">
                                </canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Tinggi Badan Tahun
                                        {{ date('Y') }}
                                    </h6>
                                </div>

                                <canvas id="tinggiChart">
                                </canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Lingkar Kepala Tahun
                                        {{ date('Y') }}
                                    </h6>
                                </div>

                                <canvas id="lingkarKepalaChart">
                                </canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Lingkar Lengan Atas Tahun
                                        {{ date('Y') }}
                                    </h6>
                                </div>

                                <canvas id="lingkarLenganAtasChart">
                                </canvas>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- <div class="table-responsive">
                    <table class="table table-hover table-bordered zero-configuration " id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                                <th>Lingkar Kepala</th>
                                <th>Lingkar Lengan Atas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tumbuhKembangAnaks as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_anak }}</td>
                                    <td>{{ $item->anak->nama }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                    <td>{{ $item->berat_badan }}</td>
                                    <td>{{ $item->tinggi_badan }}</td>
                                    <td>{{ $item->lingkar_kepala }}</td>
                                    <td>{{ $item->lingkar_lengan_atas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>

    @if ($show)
        <script>
            const ctx = document.getElementById('beratChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                        label: 'Berat (Kg)',
                        data: <?php echo json_encode($dataBerat); ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const cty = document.getElementById('tinggiChart').getContext('2d');
            new Chart(cty, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                        label: 'Tinggi (cm)',
                        data: <?php echo json_encode($dataTinggi); ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ctz = document.getElementById('lingkarKepalaChart').getContext('2d');
            new Chart(ctz, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                        label: 'Lingkar Kepala (cm)',
                        data: <?php echo json_encode($dataLingkarKepala); ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const cta = document.getElementById('lingkarLenganAtasChart').getContext('2d');
            new Chart(cta, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                        label: 'Lingkar Lengan Atas (cm)',
                        data: <?php echo json_encode($dataLingkarKepala); ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endif
@endsection
