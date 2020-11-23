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
                                <strong class="card-title">Tabel Data Custom Print</strong>
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
                                <table id="basic-datatables" class="table table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Sisi Print</th>
                                            <th>Ukuran</th>
                                            <th>Jenis jahit</th>
                                            <th>harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($custom as $row)
                                        <tr>
                                            <td>{{$row->sisiPrint->keterangan_print}}</td>
                                            <td>{{$row->ukuran->singkatan_ukuran." (".$row->ukuran->nama_ukuran.")"}}</td>
                                            <td>{{$row->jenisJahit->nama_jahit}}</td>
                                            <td>{{$row->harga}}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm " id="edit" href="{{route('custom-print.update', $row->id_custom)}}" data-short ="{{$row->id_ukuran}}" data-nama="{{$row->id_print}}" data-harga="{{$row->harga}}" data-desc="{{$row->id_jahit }}">
                                                    <i class="fa fa-edit"> </i>
                                                </button>
                                                <!-- <button href="{{ route('custom-print.destroy', $row->id_custom) }}" class="btn btn-danger btn-sm" id="delete" data-title=" " data-sub="">
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
                    @include('admin.customPrint.create')
                    @include('admin.customPrint.edit')
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
@include('templates.partials._scripts-admin')
<!--  -->
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

    $(document).ready(function(){
        $("#basic-datatables").DataTable();

        $.get({
            url:"{{url('/getJenis')}}",
            type:'get',
            dataType: 'json',
            data: {
                    "_token": "{{ csrf_token() }}",
                },
            success:function(response){
                var len = 0;
                len = response.length;
                for(var i=0; i<len; i++){
                    var id = response[i]['id_jahit'];
                    var name = response[i]['nama_jahit'];
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                    $("#updateForm #detil").append(option);
                    $("#basicform #detil").append(option); 
                }
            }
        });

        $("#updateForm #detil").on('change',function(){
            $("#updateForm #short option").each(function(){
                $(this).remove();
            });
            var updateJahit = $(this).val();
            $.get({
                url:"{{url('/getUkuran')}}/" + updateJahit,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){
                        var id = response[i]['id_ukuran'];
                        var name = response[i]['singkatan_ukuran'];
                        var jenis = response[i]['nama_ukuran'];
                        var option = "<option value='"+id+"'>"+name+" ("+ jenis +")</option>"; 
                        console.log(id);
                        $("#updateForm #short").append(option); 
                        // $("#basicform #short").append(option);
                    }
                }
            });
        });


        $("#basicform #detil").on('change',function(){
            var updateJahit = $(this).val();
            $("#basicForm #short option").each(function(){
                $(this).remove();
            });
            $.get({
                url:"{{url('/getUkuran')}}/" + updateJahit,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){
                        var id = response[i]['id_ukuran'];
                        var name = response[i]['singkatan_ukuran'];
                        var jenis = response[i]['nama_ukuran'];
                        var option = "<option value='"+id+"'>"+name+" ("+ jenis +")</option>"; 
                        // $("#updateForm #short").append(option); 
                        $("#basicform #short").append(option);
                    }
                }
            });
        });
        

        $.get({
            url:"{{url('/getSisi')}}",
            type:'get',
            dataType: 'json',
            data: {
                    "_token": "{{ csrf_token() }}",
                },
            success:function(response){
                var len = 0;
                len = response.length;
                for(var i=0; i<len; i++){
                    var id = response[i]['id_print'];
                    var name = response[i]['keterangan_print'];
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                    $("#updateForm #nama").append(option);
                    $("#basicform #nama").append(option); 
                }
            }
        });

        
    });



        $('button#edit').on('click', function () {
            
            var href = $(this).attr('href');
            var deskripsi = $(this).data('desc');
            var short = $(this).data('short');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');
            
            $('#detil').val(deskripsi);
            $('#nama').val(nama);
            $('#short').val(short);
            $('#updateForm #harga').val(harga);

            var updateJahit = $("#updateForm #detil").val();
            $.get({
                url:"{{url('/getUkuran')}}/" + updateJahit,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){
                        var id = response[i]['id_ukuran'];
                        var name = response[i]['singkatan_ukuran'];
                        var jenis = response[i]['nama_ukuran'];
                        var option = "<option value='"+id+"'>"+name+" ("+ jenis +")</option>"; 
                        $("#updateForm #short").append(option); 
                        // $("#basicform #short").append(option);
                    }
                }
            });

            $('#updateForm').attr('action', href);
            $("#editModal").modal('show');
        });

        
    </script>

@endpush