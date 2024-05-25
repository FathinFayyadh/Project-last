<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-info-subtle text-info-emphasis">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="">WEBSITE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mx-2">
                    @auth
                        @if (Auth::user()->roles[0]->name == 'superadmin')
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold fw-bold ms-2 " aria-current="page"
                                    href="{{ route('home') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold fw-bold ms-2" aria-current="page"
                                    href="{{ route('Product') }}">PRODUCT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold fw-bold ms-2" aria-current="page"
                                    href="{{ route('product.manage') }}">Manage Product</a>
                            </li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profil') }}">Profil</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold fw-bold ms-2 " aria-current="page"
                                    href="{{ route('home') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold fw-bold ms-2" aria-current="page"
                                    href="{{ route('Product') }}">PRODUCT</a>
                            </li>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu  ">
                                    <li><a class="dropdown-item" href="{{ route('profil') }}">Profil</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold fw-bold ms-2 " aria-current="page"
                                href="{{ route('home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold fw-bold ms-2" aria-current="page"
                                href="{{ route('Product') }}">PRODUCT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold btn btn-info fw-bold ms-2" aria-current="page"
                                href="{{ route('login.create') }}">LOGIN</a>
                        </li>
                        <li>
                        @endauth

                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $document.ready(function() {
            KTDatatablesDatasourceAjaxServer.init();
        });
        var table;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': {{ csrf_token() }}
            }
        });
        var KTDatatablesDatasourceAjaxServer = function() {
            var initTable1 = function() {
                table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:{
                     url:"{{ route('data.table') }}",
                     type:"GET",   
                    } 
                   
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'berat',
                            name: 'berat'
                        },
                        {
                            data: 'harga',
                            name: 'harga'
                        },
                        {
                            data: 'kondisi',
                            name: 'kondisi'
                        },
                        {
                            data: 'stock',
                            name: 'stock'
                        },



                        
                    ],
                    order: [
                        [1, 'asc']
                    ]
                });
            };

            return {
                init: function() {
                    initTable1();
                }
            };
        }();
    </script>
    <script>
        let table = new DataTable('#datatable');
    </script>
</body>

</html>
