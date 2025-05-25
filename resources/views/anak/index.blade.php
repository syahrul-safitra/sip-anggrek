@extends('Layouts.main')

@section('container')
    {{-- Container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Anak</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div>
                            <a href="{{ url('anak/create') }}" class="btn btn-primary btn-sm">Tambah</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Nama Ibu</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Berat Lahir</th>
                                        <th>Tinggi Lahir</th>
                                        <th>Proses Melahirkan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anaks as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_anak }}</td>
                                            <td>{{ $item->nama }}
                                            </td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->tempat_lahir }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->berat_lahir }}</td>
                                            <td>{{ $item->tinggi_lahir }}</td>
                                            <td>{{ $item->proses_melahirkan }}</td>
                                            <td>{{ $item->nama_ibu }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('anak/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm" style="margin-right: 10px"><i
                                                            class="fa fa-pencil "></i></a>

                                                    <form action="{{ url('anak/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Anda akan menghapus data anak?')"
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
