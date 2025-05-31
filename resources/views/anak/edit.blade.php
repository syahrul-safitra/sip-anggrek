@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Data Anak</h4>
                        {{-- <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>.input-default, input-flat,
                                .input-rounded</code> for Default input.</p> --}}
                        <div class="basic-form">
                            <form action="{{ url('anak/' . $anak->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <select class="form-control" name="nik_ayah">
                                                <option value="">Pilih</option>
                                                @if (@old('nik_ayah', $anak->nik_ayah))
                                                    @foreach ($parents as $item)
                                                        @if (@old('nik_ayah', $anak->nik_ayah) === $item->nik_ayah)
                                                            <option value="{{ $item->nik_ayah }}" selected>
                                                                {{ '( ' . $item->nik_ayah . '  ) ' . $item->nama_ayah }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item->nik_ayah }}">
                                                                {{ '( ' . $item->nik_ayah . '  ) ' . $item->nama_ayah }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($parents as $item)
                                                        <option value="{{ $item->nik_ayah }}">
                                                            {{ '( ' . $item->nik_ayah . '  ) ' . $item->nama_ayah }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('nik_ayah')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" name="nama"
                                                class="form-control input-default @error('nama')
                                                    is-invalid
                                                @enderror"
                                                value="{{ @old('nama', $anak->nama) }}" placeholder="Nama">

                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">NIK Anak</label>
                                            <input type="text" name="nik_anak"
                                                class="form-control input-default @error('nik_anak')
                                                    is-invalid
                                                @enderror"
                                                value="{{ @old('nik_anak', $anak->nik_anak) }}" placeholder="Kode Anak"
                                                name="nik_anak">

                                            @error('nik_anak')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>


                                        <div class="form-group">

                                            <label for="" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir"
                                                class="form-control input-default @error('tempat_lahir')
                                                    is-invalid
                                                @enderror"
                                                value="{{ @old('tempat_lahir', $anak->tempat_lahir) }}"
                                                placeholder="Tempat Lahir">

                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <label for="">Jenis Kelamin</label>

                                            <div>

                                                <label class="radio-inline mr-3">
                                                    <input type="radio" name="jenis_kelamin" value="laki-laki"
                                                        @checked(@old('jenis_kelamin', $anak->jenis_kelamin) === 'laki-laki')>
                                                    Laki-Laki</label>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" name="jenis_kelamin" value="perempuan"
                                                        @checked(@old('jenis_kelamin', $anak->jenis_kelamin) === 'perempuan')>
                                                    Perempuan</label>
                                            </div>

                                            @error('jenis_kelamin')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="" class="form-label">Nama Ibu</label>
                                            <input type="text" name="nama_ibu"
                                                class="form-control input-default @error('nama_ibu')
                                                    is-invalid
                                                @enderror"
                                                value="{{ @old('nama_ibu', $anak->nama_ibu) }}" placeholder="Nama Ibu">

                                            @error('nama_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div> --}}
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label for="" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir"
                                                class="form-control input-default @error('tanggal_lahir')
                                                is-invalid
                                            @enderror"
                                                placeholder="Input Default"
                                                value="{{ @old('tanggal_lahir', $anak->tanggal_lahir) }}">

                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <label for="">Proses Melahirkan</label>

                                            <div>

                                                <label class="radio-inline mr-3">
                                                    <input type="radio" name="proses_melahirkan" value="normal"
                                                        @checked(@old('proses_melahirkan', $anak->proses_melahirkan) === 'normal')>
                                                    Normal</label>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" name="proses_melahirkan" value="sesar"
                                                        @checked(@old('proses_melahirkan', $anak->proses_melahirkan) === 'sesar')>
                                                    Sesar</label>
                                            </div>


                                            @error('proses_melahirkan')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Berat Lahir (kg)</label>
                                            <input type="number" name="berat_lahir"
                                                class="form-control input-default @error('berat_lahir')
                                                    is-invalid
                                                @enderror"
                                                value="{{ @old('berat_lahir', $anak->berat_lahir) }}"
                                                placeholder="Tempat Lahir">

                                            @error('berat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <label for="" class="form-label">Tinggi Lahir (cm) </label>
                                            <input type="number" name="tinggi_lahir"
                                                class="form-control input-default @error('tinggi_lahir')
                                                    is-invalid
                                                @enderror"
                                                value="{{ @old('tinggi_lahir', $anak->tinggi_lahir) }}"
                                                placeholder="Tempat Lahir">

                                            @error('tinggi_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>


                                </div>

                                <a class="btn btn-warning btn-sm" href="{{ url('anak') }}">Kembali</a>
                                <button class="btn btn-primary btn-sm">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
