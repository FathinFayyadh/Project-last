@extends('layout.master')
@section('title', 'Login Page ')
@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-3 mt-5 shadow">
                    <h2 class="text-center mb-4">Halaman Login Pengguna</h2>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                                @error('email') is-invalid @enderror required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                autocomplete="current-password" @error('password') is-invalid @enderror required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p>Belum Punya Akun ?<a class="fw-bold text-dark" href="{{ route('register.create') }}"> Daftar
                                    Sekarang </a></p>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-25">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
