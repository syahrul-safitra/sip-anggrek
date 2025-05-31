@extends('user.Layouts.main')

@section('container')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Pilih Anak<br></h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 10%">Nama</th>
                                <th style="width: 20%">Cek Imunisasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($anaks as $anak)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $anak->nama }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center gap-4">
                                            <a href="{{ url('data-imunisasi/' . $anak->id) }}" class="btn btn-info"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                        margin-right: 5px"><i
                                                    class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
