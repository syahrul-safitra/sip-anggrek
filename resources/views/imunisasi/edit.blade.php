@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Data Imunisasi</h4>
                        <div class="basic-form">
                            <form action="{{ url('imunisasi/' . $imunisasi->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-10">

                                        <div class="form-group">
                                            <label>Kode Anak</label>
                                            <select class="form-control" name="kode_anak">
                                                <option value="">Pilih</option>
                                                @if (@old('kode_anak', $imunisasi->kode_anak))
                                                    @foreach ($anaks as $item)
                                                        @if (@old('kode_anak', $imunisasi->kode_anak) === $item->kode_anak)
                                                            <option value="{{ $item->kode_anak }}" selected>
                                                                {{ '( ' . $item->kode_anak . '  ) ' . $item->nama }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $item->kode_anak }}">
                                                                {{ '( ' . $item->kode_anak . '  ) ' . $item->nama }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($anaks as $item)
                                                        <option value="{{ $item->kode_anak }}">
                                                            {{ '( ' . $item->kode_anak . '  ) ' . $item->nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @error('kode_anak')
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


                                                @if (@old('jenis_imunisasi', $imunisasi->jenis_imunisasi))
                                                    @foreach ($jenisImunisasi as $item)
                                                        @if (@old('jenis_imunisasi', $imunisasi->jenis_imunisasi) === $item)
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
                                                value="{{ @old('tanggal', $imunisasi->tanggal) }}" placeholder="tanggal">

                                            @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <textarea class="form-control h-150px" name="catatan" rows="6" id="comment">{{ @old('catatan', $imunisasi->catatan) }}</textarea>

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
