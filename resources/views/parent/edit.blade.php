@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Ayah</h4>
                        <div class="basic-form">
                            <form action="{{ url('parent/' . $parent->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="" class="form-label">NIK</label>
                                            <input type="text" name="nik_ayah"
                                                class="form-control input-default @error('nik_ayah')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('nik_ayah', $parent->nik_ayah) }}" placeholder="nik_ayah">

                                            @error('nik_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" name="nama_ayah"
                                                class="form-control input-default @error('nama_ayah')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('nama_ayah', $parent->nama_ayah) }}" placeholder="Nama_ayah">

                                            @error('nama_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">No KK</label>
                                            <input type="text" name="no_kk"
                                                class="form-control input-default @error('no_kk')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('no_kk', $parent->no_kk) }}" placeholder="no_kk">

                                            @error('no_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">No Telepon</label>
                                            <input type="text" name="no_telepon"
                                                class="form-control input-default @error('no_telepon')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('no_telepon', $parent->no_telepon) }}"
                                                placeholder="no_telepon">

                                            @error('no_telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Password</label>
                                            <input type="text" name="password"
                                                class="form-control input-default @error('password')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('password') }}" placeholder="password">

                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <a class="btn btn-warning btn-sm" href="{{ url('parent') }}">Kembali</a>
                                <button class="btn btn-primary btn-sm">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
