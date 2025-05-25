@extends('Layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Admin</h4>
                        {{-- <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>.input-default, input-flat,
                            .input-rounded</code> for Default input.</p> --}}
                        <div class="basic-form">
                            <form action="{{ url('set-admin/' . $admin->id) }}" method="POST">
                                @csrf
                                <div class="row">



                                    <div class="col-lg-8">

                                        @if (session()->has('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        <div class="form-group">
                                            <label for="" class="form-label">Nama</label>
                                            <input type="text" name="name"
                                                class="form-control input-default @error('name')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('name', $admin->name) }}" placeholder="name">

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" name="email"
                                                class="form-control input-default @error('email')
                                                is-invalid
                                            @enderror"
                                                value="{{ @old('email', $admin->email) }}" placeholder="email">

                                            @error('email')
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
                                        <a class="btn btn-warning btn-sm" href="{{ url('anak') }}">Kembali</a>
                                        <button class="btn btn-primary btn-sm">Simpan</button>
                                    </div>


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
