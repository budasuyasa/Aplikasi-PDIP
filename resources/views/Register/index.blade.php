@extends('layouts.main')

@section('container')
    
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-registration m-auto">

                <h1 class="h1 mb-4 mt-3 fw-normal text-center">Please Register</h1>

                <form action="/register" method="POST">   
                    @csrf
                <div class="form-floating">
                    <label for="name" class="text-dark">Name</label>
                    <input type="text" name="name" class="form-control text-dark @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>   
                <div class="form-floating my-3">
                    <label for="username" class="text-dark">Username</label>
                    <input type="text" name="username" class="form-control text-dark @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>    
                <div class="form-floating">
                    <label for="email" class="text-dark">Email address</label>
                    <input type="email" name="email" class="form-control text-dark @error('username') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <label for="password" class="text-dark">Password</label>
                    <input type="password" name="password" class="form-control @error('username') is-invalid @enderror" id="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-success w-100 py-2 my-3" type="submit">Register</button>
                </form>
            </main>

            <p class="text-center">Sudah Punya Akun? <a href="/login" class="text-danger text-decoration-none">Login!</a></p>

        </div>
    </div>

@endsection