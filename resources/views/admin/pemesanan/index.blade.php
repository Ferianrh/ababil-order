@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('assets/libs/admin-style/style.css')}}">
    <link href="../../assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        i.fa.fa.fa-tasks{margin-top:10px;}
        ul li a{margin-left:-60px;}
        .menutoggle{margin: -2px 20px 0 -25px;}
        .modal-backdrop{display: none;}
    </style>
@endpush

@include('templates.partials._sidebar-admin')

@section('content')
 
 <!-- Header-->
 <header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
                <form class="search-form">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="{{asset('assets/images/examples/A.jpeg')}}" alt="User Avatar">
            </a>
            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

</header><!-- /header -->
<!-- Header-->

        <!--Table Admin-->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabel Data Pesanan Paket</strong>
                                <!-- <a href="#" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Tambah Data</a> -->
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <table id="basic-datatables" class="table table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Nama Kain</th>
                                            <th>Grade Kain</th>
                                            <th>Jenis lengan</th>
                                            <th>Jumlah Pesanan</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Status Pesanan</th>
                                            <th>Status Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pesananPaket as $row)
                                            <tr>
                                                <td>{{$row->katalog->nama_paket}}</td>
                                                <td>{{$row->kain->nama_kain}}</td>
                                                <th>{{$row->grade_kain}}</th>
                                                <th>{{$row->jenis_lengan}}</th>
                                                <td>{{$row->detailPesanan->sum('jumlah')}}</td>
                                                <th>{{$row->tanggal_pesanan}}</th>
                                                <td>{{$row->status_pesanan}}</td>
                                                <td>{{$row->status_pembayaran}}</td>
                                                <td>
                                                    <a href="{{route('pesanan-admin.edit', $row->id_pesanan)}}">
                                                        <button class="btn btn-success btn-sm " id="edit">
                                                            <i class="fa fa-edit"> </i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabel Data Pesanan printing</strong>
                                <!-- <a href="#" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Tambah Data</a> -->
                            </div>
                            
                            <div class="card-body">
                                <table id="basic-datatables" class="table table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Jumlah Pesanan</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Status Pesanan</th>
                                            <th>Status Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pesananCustom as $row)
                                        <tr>
                                            <td>{{$row->katalog->nama_paket}}</td>
                                            <td>{{$row->detailPesanan->sum('jumlah')}}</td>
                                            <td>{{$row->tanggal_pesanan}}</td>
                                            <td>{{$row->status_pesanan}}</td>
                                            <td>{{$row->status_pembayaran}}</td>
                                            <td>
                                                <a href="{{route('pesanan-admin.edit', $row->id_pesanan)}}">
                                                    <button class="btn btn-success btn-sm " id="edit">
                                                        <i class="fa fa-edit"> </i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <!-- Right Panel -->


@endsection

@push('scripts')
@include('templates.partials._sweetalert')
@include('templates.partials._scripts-admin')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
        
        //additional
        // $('button#delete').on('click', function () {
        // var href = $(this).attr('href');
        // var name = $(this).data('title');
        // var sub = $(this).data('sub');
        // Swal.fire({
        //         title: "Anda yakin untuk menghapus Ukuran \n\"" + name + "(" + sub + ")\"?",
        //         text: "Setelah dihapus, data tidak bisa dikembalikan!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         cancelButtonText: 'Batal',
        //         confirmButtonText: 'Ya, hapus'
        //     })
        //     .then((willDelete) => {
        //         if (willDelete.value) {
        //             $('#deleteForm').attr('action', href);
        //             $('#deleteForm').submit();
        //         }
        //     })
        // });

    </script>

@endpush