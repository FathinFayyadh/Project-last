@extends('layout.master')
@section('title', 'Checkout')
@section('content')



        <div class="container py-3">
            <div class="row">
                <div class="card shadow">
                    <h2 class="text-center fw-bold mt-2">Detail Product</h2>
                    <div class="d-flex  align-items-center">
                        <div class="col-md-5  mb-5 mt-3 offset-1">
                            <div class="d-flex justify-content-end">
                                <img class="card-img-top image-product rounded w-100 h-100 p-3" src="{{$product->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <h2>{{$product->name}}</h2>
                            <div class="d-flex justify-content-between">
                                <p>Stock : {{$product->stock}}</p>
                                <p class="border border-info p-1 rounded bg-info">Rp.{{$product->harga}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-secondary">Kondisi : {{$product->kondisi}}</p>
                                <p>{{$product->berat}}gr</p>

                            </div>
                            <p>{{$product->description}}</p>

                            <div class="text-center">
                                <a href="{{route('checkout.store', $product->id)}}" class="btn btn-dark">Chekkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
