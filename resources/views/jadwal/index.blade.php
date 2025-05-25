@extends('Layouts.main')

@section('container')
    {{-- Container --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Jadwal</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Status Libur</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwals as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->hari }}</td>
                                            <td>{{ $item->jam }}</td>
                                            <td><span
                                                    class="badge {{ $item->status_libur == true ? 'badge-danger' : 'badge-success' }} px-2">{{ $item->status_libur == true ? 'Libur' : 'Tidak Libur  ' }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('jadwal/' . $item->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm" style="margin-right: 10px"><i
                                                            class="fa fa-pencil "></i></a>
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
