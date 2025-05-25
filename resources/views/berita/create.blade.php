@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Berita</h4>
                        <div class="basic-form">
                            <form action="{{ url('berita') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-10">

                                        <div class="form-group">
                                            <label for="" class="form-label">Judul</label>
                                            <input type="text" name="judul"
                                                class="form-control input-default @error('judul')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('judul') }}" placeholder="judul">

                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal"
                                                class="form-control input-default @error('tanggal')
                                            is-invalid
                                        @enderror"
                                                value="{{ @old('tanggal') }}" placeholder="tanggal">

                                            @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label">Isi</label>
                                            @error('isi')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="isi" type="hidden" value="{{ old('isi') }}" name="isi"
                                                required>
                                            <trix-editor input="isi"></trix-editor>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Gambar</label>
                                            <input type="file" name="gambar" class="form-control-file" id="image"
                                                onchange="previewImage()" accept="image/*">

                                            <img class="rounded mt-4 w-25" id="img-preview">

                                            @error('gambar')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <a class="btn btn-warning btn-sm" href="{{ url('berita') }}">Kembali</a>
                                <button class="btn btn-primary btn-sm">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
