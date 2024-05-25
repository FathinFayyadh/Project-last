@extends('layout.master')
@section('tilte', 'dashboard')
@section('content')

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-6">

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Informasi Akun {{ $userId }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">

                            <div class="col-5">
                                <div class="">Nama akun</div>
                                <div class="">Email </div>
                                <div class="">Umur</div>
                                <div class="">Tanggal Lahir</div>
                                <div class="">Alamat</div>
                            </div>
                            <div class="col-5 ">

                                <div class="">{{ $user->name }}</div>
                                <div class="">{{ $user->email }}</div>
                                <div class="">{{ $user->age }}</div>
                                <div class="">{{ $user->brith }}</div>
                                <div class="">{{ $user->adderess }}</div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4   ">
                            <div class="">
                                <a class="font-weight-bold btn btn-success fw-bold ms-2" aria-current="page"
                                    href="">Export</a>
                            </div>
                            <div class="">
                                <a class="font-weight-bold btn btn-danger fw-bold ms-2" aria-current="page"
                                    href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>



@endsection
