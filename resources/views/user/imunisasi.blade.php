@extends('user.Layouts.main')

@section('container')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Informasi Imunisasi<br></h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">

                @if ($imunisasis)
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered zero-configuration " id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Imunisasi</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($imunisasis as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nik_anak }}</td>
                                        <td>{{ $item->anak->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                        <td>{{ $item->jenis_imunisasi }}</td>
                                        <td>{{ $item->catatan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
