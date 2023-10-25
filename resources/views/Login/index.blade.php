@extends('layouts.main')

@section('container')
    
    <div class="row justify-content-center">
        <div class="col-md-5 text-light">

            {{-- alert untuk login berhasil! --}}
            @if(session()->has('succes'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('succes') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- alert untuk login gagal! --}}
            @if(session()->has('loginError'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin m-auto text-dark">

                <h1 class="h1 mb-4 mt-3 fw-normal text-center">Please Log In</h1>

                <form action="/login" method="POST">    
                    
                    @csrf {{-- Untuk Pengamanan Form Token --}}

                <div class="form-floating mb-4">
                    <label for="email" class="text-dark">Email address</label>
                    <input type="email" name="email" class="form-control text-dark @error('email') is-invalid @enderror" id="email" autofocus value="{{ old('email') }}">
                        <div class="invalid-feedback">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                </div>

                <div class="form-floating">
                    <label for="password" class="text-dark">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        <div class="invalid-feedback">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                </div>

                <button class="btn btn-danger w-100 py-2 mt-4" type="submit">Log in</button>
                </form>

            </main>

            <p class="text-center text-dark mt-1">Belum punya akun? <a href="/register" class="text-danger text-decoration-none">Register!</a></p>

        </div>
    </div>

@endsection