@extends('user.Layouts.main')

@section('container')
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Data Imunisasi<br></h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">


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
                                        <td>{{ $item->kode_anak }}</td>
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
