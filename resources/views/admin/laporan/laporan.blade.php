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
                <div class="form-group col-md-2">
                    <label class="control-label">Filter :</label>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Bulan :</label>
                    <select name="bulan" class="form-control">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Tahun :</label>
                    <select name="tahun" class="form-control">
                        @foreach($year as $row)
                            <option value="{{$row->year}}">{{$row->year}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabel Data Penjualan</strong>
                                <a href="{{route('laporan.cetak')}}" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Cetak Laporan</a>
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
                                <table id="basic-dataTables" class="table table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Paket</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Total Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $row)
                                        <tr>
                                            <td>{{$row->pengiriman->nama_penerima}}</td>
                                            <td>{{$row->katalog->nama_paket}}</td>
                                            <td>{{$row->tanggal_pesanan}}</td>
                                            <td>{{$row->updated_at}}</td>
                                            <td>{{format_rupiah($row->pembayaran->total_pembayaran)}}</td>
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
        $(document).ready(function(){
            $("#basic-dataTables").DataTable();
        });
        //additional
        // $('button#delete').on('click', function () {
        // var href = $(this).attr('href');
        // var name = $(this).data('title');
        // Swal.fire({
        //         title: "Anda yakin untuk menghapus Jenis Jahit \"" + name + "\"?",
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
            var nama = $(this).data("nama");
            
            // $('#deskripsi_jahit').val(deskripsi);
            $('#ket_print').val(nama);
            $('#updateForm').attr('action', href);
            $("#editModal").modal('show');
        });
    </script>

@endpush