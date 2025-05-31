@extends('user.Layouts.main')

@section('container')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Profile<br></h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-body">

                <h4 class="card-title">Data Ayah</h4>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No KK</th>
                                <th>No Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $parent->nik_ayah }}</td>
                                <td>{{ $parent->nama_ayah }}</td>
                                <td>{{ $parent->no_kk }}</td>
                                <td>{{ $parent->no_telepon }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if ($parent->anak)
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Data Anak</h4>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Berat Lahir</th>
                                    <th>Tinggi Lahir</th>
                                    <th>Proses Melahirkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parent->anak as $item)
                                    <tr>
                                        <td>{{ $item->nik_anak }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tangga_lahir)) }}</td>
                                        <td>{{ $item->tempat_lahir }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->berat_lahir }}</td>
                                        <td>{{ $item->tinggi_lahir }}</td>
                                        <td>{{ $item->proses_melahirkan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
