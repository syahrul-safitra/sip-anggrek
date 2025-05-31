@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Imunisasi</h4>
                        <div class="basic-form">
                            <form action="{{ url('imunisasi') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-10">

                                        <div class="form-group">
                                            <label>Nik Anak</label>
                                            <select class="form-control" name="nik_anak">
                                                <option value="">Pilih</option>
                                                @if (@old('nik_anak'))
                                                    @foreach ($anaks as $item)
                                                        @if (@old('nik_anak') === $item->nik_anak)
                                                            <option value="{{ $item->nik_anak }}" selected>
                                                                {{ '( ' . $item->nik_anak . '  ) ' . $item->nama }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item->nik_anak }}">
                                                                {{ '( ' . $item->nik_anak . '  ) ' . $item->nama }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($anaks as $item)
                                                        <option value="{{ $item->nik_anak }}">
                                                            {{ '( ' . $item->nik_anak . '  ) ' . $item->nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('nik_anak')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Imunisasi</label>
                                            <select class="form-control" name="jenis_imunisasi">
                                                <option value="">Pilih</option>
                                                @foreach ($jenisImunisasi as $item)
                                                    <option value="{{ $item }}" @selected(@old('jenis_imunisasi' == $item))>
                                                        {{ $item }}</option>
                                                @endforeach


                                                @if (@old('jenis_imunisasi'))
                                                    @foreach ($jenisImunisasi as $item)
                                                        @if (@old('jenis_imunisasi') === $item)
                                                            <option value="{{ $item }}" selected>
                                                                {{ $item }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item }}">
                                                                {{ $item }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($anaks as $item)
                                                        <option value="{{ $item }}">
                                                            {{ $item }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('jenis_imunisasi')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
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
                                            <label>Catatan</label>
                                            <textarea class="form-control h-150px" name="catatan" rows="6" id="comment">{{ @old('catatan') }}</textarea>

                                            @error('catatan')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
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
