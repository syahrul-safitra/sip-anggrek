@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Anak</h4>
                        <div class="basic-form">
                            <form action="{{ url('jadwal/' . $jadwal->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="" class="form-label">Hari</label>
                                            <input type="text" name="hari"
                                                class="form-control input-default @error('hari')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('hari', $jadwal->hari) }}" placeholder="hari" readonly>

                                            @error('hari')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Jam</label>
                                            <input type="text" name="jam"
                                                class="form-control input-default @error('jam')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('jam', $jadwal->jam) }}" placeholder="jam">

                                            @error('jam')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <label for="">Status Libur</label>
                                            <div>

                                                @if ($jadwal->status_libur)
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="status_libur" value=true checked>
                                                        Libur</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="status_libur" value=false>
                                                        Tidak Libur</label>
                                                @else
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="status_libur" value=true>
                                                        Libur</label>
                                                    <label class="radio-inline mr-3">
                                                        <input type="radio" name="status_libur" value=false checked>
                                                        Tidak Libur</label>
                                                @endif

                                            </div>

                                            @error('status_libur')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                        </div>

                        <a class="btn btn-warning btn-sm" href="{{ url('jadwal') }}">Kembali</a>
                        <button class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
