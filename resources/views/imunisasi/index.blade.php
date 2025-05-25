@extends('Layouts.main')

@section('container')
    {{-- Container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Imunisasi</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div>
                            <a href="{{ url('imunisasi/create') }}" class="btn btn-primary btn-sm">Tambah</a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#exampleModal">
                                Cetak
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ url('cetakdataimunisasi') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cetak Data Imunisasi</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center">
                                                    <input type="date"
                                                        class="form-control @error('tanggal_awal') is-invalid @enderror"
                                                        name="tanggal_awal" value="{{ old('tanggal_awal') }}"
                                                        id="tanggal_awal">
                                                    @error('tanggal_awal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <input type="date"
                                                        class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                                        name="tanggal_akhir" value="{{ old('tanggal_akhir') }}"
                                                        id="tanggal_akhir">
                                                    @error('tanggal_awal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Imunisasi</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($imunisasis as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_anak }}</td>
                                            <td>{{ $item->anak->nama }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->jenis_imunisasi }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('imunisasi/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm" style="margin-right: 10px"><i
                                                            class="fa fa-pencil "></i></a>

                                                    <form action="{{ url('imunisasi/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Anda akan menghapus data imunisasi?')"
                                                            class="btn btn-sm btn-danger"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Container --}}
@endsection
