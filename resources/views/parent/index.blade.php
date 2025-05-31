@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Orang Tua (Ayah)</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div>
                            <a href="{{ url('parent/create') }}" class="btn btn-primary btn-sm">Tambah</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>No KK</th>
                                        <th>No Telepon (WA)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parents as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nik_ayah }}</td>
                                            <td>{{ $item->nama_ayah }}</td>
                                            <td>{{ $item->no_kk }}</td>
                                            <td>{{ $item->no_telepon }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('parent/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm" style="margin-right: 10px"><i
                                                            class="fa fa-pencil "></i></a>

                                                    <form action="{{ url('parent/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Anda akan menghapus data Orang Tua?')"
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
@endsection
