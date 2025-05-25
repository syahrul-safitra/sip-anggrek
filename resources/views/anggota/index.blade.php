@extends('Layouts.main')

@section('container')
    {{-- Container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Anggota</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div>
                            <a href="{{ url('anggota/create') }}" class="btn btn-primary btn-sm">Tambah</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggotas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_telpon }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">


                                                    <a href="{{ url(asset('img/' . $item->foto)) }}"
                                                        class="btn btn-info btn-sm" style="margin-right: 10px">
                                                        <i class="fa fa-pencil "></i>
                                                    </a>

                                                    <a href="{{ url('anggota/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm" style="margin-right: 10px"><i
                                                            class="fa fa-pencil "></i></a>

                                                    <form action="{{ url('anggota/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Anda akan menghapus data anggota?')"
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
