@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Anggota</h4>
                        <div class="basic-form">
                            <form action="{{ url('anggota/' . $anggota->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-10">

                                        <div class="form-group">
                                            <label for="" class="form-label">Kode</label>
                                            <input type="text" name="kode"
                                                class="form-control input-default @error('kode')
                                        is-invalid
                                    @enderror"
                                                value="{{ @old('kode', $anggota->kode) }}" placeholder="kode">

                                            @error('kode')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" name="nama"
                                                class="form-control input-default @error('nama')
                                        is-invalid
                                    @enderror"
                                                value="{{ @old('nama', $anggota->nama) }}" placeholder="nama">

                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Alamat</label>
                                            <input type="text" name="alamat"
                                                class="form-control input-default @error('alamat')
                                        is-invalid
                                    @enderror"
                                                value="{{ @old('alamat', $anggota->alamat) }}" placeholder="alamat">

                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">No Telepon</label>
                                            <input type="text" name="no_telpon"
                                                class="form-control input-default @error('no_telpon')
                                        is-invalid
                                    @enderror"
                                                value="{{ @old('no_telpon', $anggota->no_telpon) }}"
                                                placeholder="no_telpon">

                                            @error('no_telpon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="foto" class="form-control-file" id="image"
                                                onchange="previewImage()">

                                            <img class="rounded mt-4 w-25" id="img-preview"
                                                src="{{ asset('img/' . $anggota->foto) }}">

                                            @error('foto')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                    </div>


                                </div>

                                <a class="btn btn-warning btn-sm" href="{{ url('perkembangan-anak') }}">Kembali</a>
                                <button class="btn btn-primary btn-sm">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
