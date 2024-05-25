@extends('layout.master')
@section('title', 'Register Page ')
@section('content')

    <div class="container mt-5  rounded">
        <div class="row justify-content-center mt-5">
            <div class="mb-3">


            </div>
            <div class="container">
                @if (Session::get('error'))
                    <div class="row">
                        <div class="col-md-4 offset-4 mt-2 py-2 rounded bg-danger text-white fw-bold">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-5 rounded shadow  ">
                        <h3 class="text-center fw-bold">Halaman Register User</h3>
                        <form class="mt-3" action="{{ route('register.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Masukkan nama user" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Masukkan email user" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control"
                                    @error('password') is-invalid 
                    @enderror id="password"
                                    name="password" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Jenis kelamin</label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                    <option selected disabled>Select Gender</option>
                                    <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">laki-laki
                                    </option>
                                    <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Perempuan
                                    </option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Umur</label>
                                <input type="number" class="form-control @error('age') is-invalid @enderror" name="age"
                                    placeholder="Masukkan umur user" value="{{ old('age') }}">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('birth') is-invalid @enderror"
                                    name="birth" placeholder="Masukkan tanggal lahir user" value="{{ old('birth') }}">
                                @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Alamat</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="adderess" placeholder="Masukkan alamat user" value="{{ old('adderess') }}">
                                @error('adderess')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex mb-3 mt-4">
                                <div class="mx-auto">
                                    <a href="" class="btn btn-warning me-2">
                                        Kembali</a>
                                    <button class="btn btn-dark" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endsection
