@extends('layout.master')
@section('title', 'Manage Product')
@section('content')

    <div class="container">
        <div class="row my-lg-5 bg-info rounded p-2">
            <div class="col-12 my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-3">
                        <h3 class="fw-bold">List Produk</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('profil') }}" class="btn btn-primary">Lihat Profil</a>
                        <a href="{{ route('form.create') }}" class="btn btn-dark">Tambah Produk</a>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Import Product
                        </button>

                        <!-- Modal -->

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Import data Product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('import.create') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body text-start">
                                            <a class=" mb-2" href="{{ asset('data.xlsx') }}">Klik untuk mengunduh data
                                                import</a>
                                            <div class="mb-1">
                                                <label for="exampleFormControlInput1" class="form-label fw-semibold">Gambar
                                                    Produk</label>
                                                <input type="file" class="form-control " name="fileimport"
                                                    id="fileimport">

                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('export') }}" class="btn btn-warning">Export Product</a>
                    </div>
                </div>
            </div>
            <div class=" d-flex justify-content-end mb-5">

                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pilih Kondisi barang
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Baru</a></li>
                        <li><a class="dropdown-item" href="#">Bekas</a></li>
                    </ul>
                </div>
            </div>
            <table class="table table-bordered table-striped align-items-center" id="datatable">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stock</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Kondisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php $no = 1; @endphp
                    @foreach ($products as $product)
                        <tr class="text-center justify-content-center align-items-center ">
                            <td class="">{{ $no }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->berat }}</td>
                            <td>{{ $product->harga }}</td>
                            <td>
                                <p
                                    class="p-1 rounded text-light @if (strtolower($product->kondisi) == 'baru') bg-success @else bg-dark @endif">
                                    {{ $product->kondisi }}
                                </p>
                            </td>
                            <td class="d-flex justify-content-center align-items-center w-100 h-100">
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                    class="btn btn-warning  w-100  me-2">Edit</a>
                                <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST"
                                    class="w-100 py-2">
                                    @csrf
                                    <button class="btn btn-danger  w-100 " type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
