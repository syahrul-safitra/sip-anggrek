@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Perkembangan Anak</h4>
                        <div class="basic-form">
                            <form action="{{ url('perkembangan-anak/' . $perkembangan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label>Kode Anak</label>
                                            <select class="form-control" name="kode_anak">
                                                <option value="">Pilih</option>
                                                @if (@old('kode_anak', $perkembangan->kode_anak))
                                                    @foreach ($anaks as $item)
                                                        @if (@old('kode_anak', $perkembangan->kode_anak) === $item->kode_anak)
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
                                            <label for="" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal"
                                                class="form-control input-default @error('tanggal')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('tanggal', $perkembangan->tanggal) }}" placeholder="tanggal">

                                            @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Berat Badan (kg)</label>
                                            <input type="text" name="berat_badan"
                                                class="form-control input-default @error('berat_badan')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('berat_badan', $perkembangan) }}" placeholder="berat_badan">

                                            @error('berat_badan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Tinggi Badan (cm)</label>
                                            <input type="text" name="tinggi_badan"
                                                class="form-control input-default @error('tinggi_badan')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('tinggi_badan', $perkembangan->tinggi_badan) }}"
                                                placeholder="tinggi_badan">

                                            @error('tinggi_badan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Lingkar Kepala</label>
                                            <input type="text" name="lingkar_kepala"
                                                class="form-control input-default @error('lingkar_kepala')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('lingkar_kepala', $perkembangan->lingkar_kepala) }}"
                                                placeholder="lingkar_kepala">

                                            @error('lingkar_kepala')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="form-label">Lingkar Lengan Atas</label>
                                            <input type="text" name="lingkar_lengan_atas"
                                                class="form-control input-default @error('lingkar_lengan_atas')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('lingkar_lengan_atas', $perkembangan->lingkar_lengan_atas) }}"
                                                placeholder="lingkar_lengan_atas">

                                            @error('lingkar_lengan_atas')
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
