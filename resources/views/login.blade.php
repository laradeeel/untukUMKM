@extends('layouts.app')

@section('content')
    <h1><b>Halaman Login</b></h1>
    <hr class="opacity-100 mb-5">

    <div class="col-lg-12 mx-3">
        <div class="card border border-black mx-auto" style="width: 320px;">
            <div class="card-body">
                <form action="authenticate" method="POST" class="mb-3">
                    @csrf
                    <input type="email" value="{{ Session::get('email') }}" class="form-control border border-black @error('email') is-invalid @enderror" name="email" placeholder="Email" autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <hr class="opacity-100">
                    <input type="password" class="form-control border border-black @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="off">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <hr class="opacity-100">

                    {{-- ALERT LOGIN GAGAL --}}
                    <div class="form-outline">
                        @if(Session::has('failed'))
                            <div class="alert alert-danger py-1">
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                    </div>
                    {{-- ALERT REGISTRASI BERHASIL --}}
                    <div class="form-outline">
                        @if(Session::has('success'))
                            <div class="alert alert-success py-1">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>

                    <button class="btn btn-success w-100" type="submit"><b>Login</b></button>
                </form>
                {{-- <a href="{{ url('/register') }}" class="text-decoration-none text-success"><b>Belum punya akun?</b></a> --}}
            </div>
        </div>
    </div>

    <hr class="mt-5 opacity-100">
@endsection