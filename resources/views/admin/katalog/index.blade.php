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
                                <strong class="card-title">Tabel Data Jenis Jahit</strong>
                                <a href="#" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Tambah Data</a>
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
                                <table id="basic-datatables" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Deskripsi Paket</th>
                                            <th>Harga Paket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($katalog as $row)
                                        <tr>
                                            <td>{{$row->nama_paket}}</td>
                                            <td>{{$row->deskripsi_paket}}</td>
                                            <td>{{$row->harga_paket}}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm " id="edit" href="{{route('katalog.update', $row->id_paket)}}" data-nama="{{$row->nama_paket}}" data-desc="{{ $row->deskripsi_paket }}" data-harga="{{$row->harga_paket}}">
                                                    <i class="fa fa-edit"> </i>
                                                </button>
                                                <!-- <button href="{{ route('katalog.destroy', $row->id_paket) }}" class="btn btn-danger btn-sm" id="delete" data-sub="{{$row->nama_paket}}">
                                                    <i class="fa fa-trash"> </i>
                                                </button> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                    </div>
                    @include('admin.katalog.create')
                    @include('admin.katalog.edit')
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <!-- Right Panel -->

<form action="" method="post" id="deleteForm">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>

@endsection

@push('scripts')
@include('templates.partials._sweetalert')
@include('templates.partials._scriptsuser')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        
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

        $('button#edit').on('click', function () {
            var href = $(this).attr('href');
            var deskripsi = $(this).data('desc');
            var harga = $(this).data('harga');
            var nama = $(this).data('nama');
            
            $('#detil').val(deskripsi);
            $('#nama').val(nama);
            $('#harga').val(harga);
            $('#updateForm').attr('action', href);
            $("#editModal").modal('show');
        });
    </script>

@endpush