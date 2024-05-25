@extends('layout.master')
@section('title', 'Landing page ')

@section('content')

    <section id="home" class=" mb-5 mt-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-8  p-5 mt-2">
                    <h4 class="font-weight-bold">Discover. Connect. Thrive</h4>
                    <h1 class="display-3 fw-bold">Transform Your Shopping Experience</h1>
                    <p class="">Welcome to WEBSITE Shopping, where your desires meet their perfect match. Immerse
                        yourself in a world of endless possibilities, curated just for you. Whether you're hunting for
                        unique finds, everyday essentials, or extraordinary gifts, we've got you covered.!</p>
                    <a class="btn btn-info text-dark fw-bold " href="#" role="button">Buy Now! </a>
                </div>
                <div class="col-md-4 ">
                    <img src="{{ asset('img/shopping.jpg') }}" alt="Image brand"
                        class="img-fluid rounded-pill shadow  img-brand">
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
