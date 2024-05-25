@extends('layout.master')

@section('title', 'Transaction')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-6 ">

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Invoice Transaksi {{ $productId}} </h3>
                </div>
                <div class="card-body">
                    <h5>Detail Transaksi</h5>
                    <div class="border-bottom border-dark border-2"></div>
                    <div class="d-flex justify-content-between">
                        <div class="col-5">
                            <div class="mb-1">No. Invoice</div>
                            <div class="mb-1">Admin Free </div>
                            <div class="mb-1">Kode Unik</div>
                            <div class="mb-1">Total</div>
                            <div class="mb-1">Metode Pemayaran  </div>
                            <div class="mb-1">Status </div>
                            <div class="mb-1">Tanggal Kadarluarsa</div>
                        </div>
                        <div class="col-5 text-end ">

                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>

                        </div>
                    </div>
                    <h5>Product Yang dibeli </h5>
                    <div class="border-bottom border-dark border-2"></div>
                    <div class="d-flex  align-items-center">
                        <div class="col-md-5  mb-2 mt-3 ">
                            <div class="d-flex ">
                                <img class="card-img-top image-product rounded-1 w-100 h-100 p-2" src="{{$product->image}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-7 ">
                            <h2>{{$product->name}}</h2>
                            <div class="d-flex justify-content-between">
                                <p>Stock : {{$product->stock}}</p>
                                <p class="border border-info p-1 rounded bg-info ">Rp.{{$product->harga}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-secondary">Kondisi : {{$product->kondisi}}</p>
                                <p>{{$product->berat}}gr</p>

                            </div>

                            
                        </div>
                    </div>
                    <h5>Data Pembeli </h5>
                    <div class="border-bottom border-dark border-2"></div>
                    <div class="d-flex justify-content-between">
                        <div class="col-5">
                            <div class="mb-1">Nama</div>
                            <div class="mb-1">Email</div>
                            <div class="mb-1">Handphone</div>
                            <div class="mb-1">Alamat</div>
                           
                        </div>
                        <div class="col-5 text-end ">

                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                            <div class="mb-1">test</div>
                           

                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4   ">
                        
                        <div class="">
                            <a class="font-weight-bold btn btn-success fw-bold ms-2" aria-current="page"
                                href="">Bayar</a>
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