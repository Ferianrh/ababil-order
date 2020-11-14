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
                    <div class="col-md-12 mt-4 mb-4">
                        <div class="p-4 bg-white border--radius">
                        <div class="form-group ">
                            <h3>Status Pembayaran</h3>
                                <div class="row" >
                                    <label for="" class="col-sm-3">Biaya Pengerjaan :</label>
                                    <select name="status_pembayaran" id="state" class="form-control col-sm-6">
                                        <option value="BELUM BAYAR">BELUM BAYAR</option>
                                        <option value="DP">DP</option>
                                        <option value="LUNAS">LUNAS</option>
                                    </select>
                                    <input type="number" name="sudah_dibayar" id="pengerjaan" class="form-control col-sm-3" readonly>
                                </div>
                                <div class="row">
                                    <label for="" class="col-sm-3">Biaya Pengiriman :</label>
                                    <select name="" id="pengiriman" class="form-control col-sm-6">
                                        <option value="BELUM BAYAR">BELUM BAYAR</option>
                                        <option value="LUNAS">LUNAS</option>
                                    </select>
                                    <input type="number" name="pengiriman" id="pengiriman" class="form-control col-sm-3" readonly>
                                </div>
                        </div>
                            <h3 class="mt-0">Data pengiriman</h3>
                            <form action="{{ route('pengiriman.store') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id_pesanan" value="{{$order->id_pesanan}}">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Nama <span class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control col-sm-9" name="nama_pelanggan" value="{{$order->pelanggan->nama_lengkap}}">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Email <span class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control col-sm-9" name="email" value="{{$order->pelanggan->email}}">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">No Hp <span class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control col-sm-9" name="no_hp" value="{{$order->pelanggan->no_hp}}">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Provinsi</label>
                                    <select name="provinsi" id="prov" class="form-control col-sm-9">
                                    @foreach($prov as $row)
                                        @if($row->id_provinsi == $pengiriman->id_provinsi)
                                            <option value="{{$row->id_provinsi}}" selected>{{$row->nama_provinsi}}</option>
                                        @else
                                        <option value="{{$row->id_provinsi}}">{{$row->nama_provinsi}}</option>

                                        @endif
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Kota</label>
                                    <select name="kota" id="city" class="form-control col-sm-9">
                                    @foreach($city as $row)
                                        @if($row->id_kota == $pengiriman->id_kota)
                                            <option value="{{$row->id_kota}}" selected>{{$row->nama_kota}}</option>
                                        @else
                                        <option value="{{$row->id_kota}}">{{$row->nama_kota}}</option>

                                        @endif
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Alamat Lengkap <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control col-sm-9" name="alamat_lengkap" value="{{$order->pelanggan->alamat_lengkap}}">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Kode Pos <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control col-sm-9" name="kode_pos" value="{{$order->pelanggan->kode_pos}}">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Kurir <spant class="text-danger">*</spant>:</label>
                                    <select name="kurir" id="courier" class="form-control col-sm-9">
                                    <!-- <option value="" disabled selected>--Pilih Kurir--</option> -->
                                        @foreach($courier as $row)
                                        @if($pengiriman->id_kurir == $row->id_kurir)
                                            <option value="{{$row->kode_kurir}}" selected>{{$row->nama_kurir}}</option>
                                        @else
                                        <option value="{{$row->kode_kurir}}">{{$row->nama_kurir}}</option>
                                        @endif
                                            
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-3">Jenis Layanan <spant class="text-danger">*</spant>:</label>
                                    <label class="control-label col-sm-4">{{$pengiriman->jenis_pengiriman}}</label>

                                    <label class="control-label col-sm-2">Harga :</label>
                                    <input type="text" value="{{$pengiriman->biaya_pengiriman}}" id="cost" name="biaya_pengiriman" class="form-control col-sm-3" readonly required>
                                </div>
                                <?php $berat = ($detailOrder->sum('jumlah') / 12) * 2000 ?>
                                <input type="hidden" name="berat" value="{{$berat}}" id="berat">
                                <p class="text-warning">Note: Berat akan di asumsikan 1 lusin = 2kg</p>
                                
                            <!-- <button type="button" class="btn btn-light p-2">Pilih Alamat Lain</button> -->

                            <div class="form-group mt-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="comment">Produk Dipesan</label>
                                    </div>
                                    <div class="col-md-3 " >
                                        <p class="judul text-center">Harga Satuan</p>
                                    </div>
                                    <div class="col-md-2 " >
                                        <p class="judul text-center">Ukuran</p>
                                    </div>
                                    <div class="col-md-1 " >
                                        <p class="judul text-center">Jumlah</p>
                                    </div>
                                    <div class="col-md-3 " >
                                        <p class="judul text-right">Sub Total</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3  " >
                                        <img src="{{asset('assets/images/pesan')}}/{{$order->pesanan->custom_desain}}" width="40" height="40">
                                        <p style="display:inline-block; margin-left:15px;">{{$order->pesanan->katalog->nama_paket}}</p>
                                    </div>
                                    <div class="col-md-3 " >
                                        <p class="text-center">{{format_rupiah($order->pesanan->katalog->harga_paket)}}</p>
                                    </div>
                                    <div class="col-md-2 " >
                                    @foreach($detailOrder as $row)
                                        <p  class="text-center ">{{ $row->ukuran->singkatan_ukuran }} ({{ $row->ukuran->nama_ukuran }})</p>
                                    @endforeach
                                    </div>
                                    <div class="col-md-1 " >
                                    @foreach($detailOrder as $row)
                                        <p  class="text-center ">{{$row->jumlah}}</p>
                                    @endforeach
                                    </div>
                                    <div class="col-md-3 " >
                                    @foreach($detailOrder as $row)
                                        <p  class="text-right">{{ format_rupiah($row->jumlah * $order->pesanan->katalog->harga_paket) }}</p>
                                    @endforeach
                                    </div>
                                    <?php 
                                        $totalPesan = $detailOrder->sum('jumlah') * $order->pesanan->katalog->harga_paket;
                                    ?>
                                </div>
                                
                            </div>
                            
                            <div class="form-group mt-4 ">
                                <p>Opsi Pemesanan :</p>
                                <div class="row">
                                    <div class="col-md-1">
                                        <p>Grade :</p>
                                    </div>
                                    <?php 
                                        if($order->pesanan->grade_kain == 'B'){
                                            $harga = 0;
                                        }else{
                                            $harga = 20000;
                                        }
                                    ?>
                                    <div class="col-md-1  offset-md-1" >
                                        <p>{{ $order->pesanan->grade_kain }}</p>
                                    </div>
                                    <div class=" col-md-3" >
                                        <p class="text-center"> {{format_rupiah($harga)}}</p>
                                    </div>
                                    <div class="offset-md-2 col-md-1 " >
                                        <p class=" text-center">{{ $detailOrder->sum('jumlah') }}</p>
                                    </div>
                                    <div class="offset-md-1 col-md-2 " >
                                        <p class="text-right">{{ format_rupiah($harga * $detailOrder->sum('jumlah')) }}</p>
                                        <?php
                                            $totalGrade = $harga * $detailOrder->sum('jumlah');
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php 
                                        if($order->pesanan->jenis_lengan == 'Lengan Panjang'){
                                            $lengan = 10000;
                                        }else{
                                            $lengan = 0;
                                        }
                                    ?>
                                    <div class="col-md-3" >
                                        <p>{{ $order->pesanan->jenis_lengan }}</p>
                                    </div>
                                    <div class="offset-md-1 col-md-2" >
                                        <p class="text-left"> {{format_rupiah($lengan)}}</p>
                                    </div>
                                    <div class="offset-md-2 col-md-1 " >
                                        <p class=" text-center">{{ $detailOrder->sum('jumlah') }}</p>
                                    </div>
                                    <div class="offset-md-1 col-md-2 " >
                                        <p class="text-right">{{ format_rupiah($lengan * $detailOrder->sum('jumlah') ) }}</p>
                                        <?php 
                                            $totalLengan =  $lengan * $detailOrder->sum('jumlah');
                                        ?>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    
                                    <div class="col-md-9 " >
                                        <p  class="text-right">Total:</p>
                                    </div>
                                    <div class="col-md-3 " >
                                        <p class="text-right">{{format_rupiah($totalPesan + $totalLengan + $totalGrade)}}</p>
                                        <input type="hidden" value = "{{$totalPesan + $totalLengan + $totalGrade}}" id="total">
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    
                                    <div class="col-md-9 " >
                                        <p  class="text-right" >Grand Total:</p>
                                    </div>
                                    <div class="col-md-3 " >
                                        <p class="text-right" id="grand">{{format_rupiah($payment->total_pembayaran)}}</p>
                                        <input type="hidden" name="grand_total" value = "" id="grandTotal">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Simpan <i class="fa fa-save"></i></button>
                            <div class="clearfix"></div>
                            </form>
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

<script type="text/javascript">

function convertToRupiah(angka)
{
    var rupiah = '';		
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

$(document).ready(function(){

    $("#prov").on('change',function(){
    var prov = $(this).val();
        $.get({
                url:"{{url('/getCity')}}/"+prov,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    $("#city option").each(function(){
                            $(this).remove();
                        });
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){
                        
                        var id = response[i]['id_kota'];
                        var name = response[i]['nama_kota'];

                        var option = "<option value='"+id+"'>"+name+"</option>"; 
                        $("#city").append(option);
                    }
                }
        });
    });

    

    $("#courier").on("change",function(){
       var courier = $(this).val();
       var cityId = $('#city').val();
       $.ajax({
            url:"{{route('rajaongkir.service')}}",
            type:'POST',
            // dataType: 'json',
            data: 
                {
                    "kota": cityId, 
                    "kurir": courier,
                    "_token": "{{ csrf_token() }}",
                    
                },
            success:function(response){
                $("#service").empty().append(
                        '<option value="" selected disabled> Select Service </option>');

                var services = response.costs;
                // for(var i=0; i<len; i++){
                services.forEach(function (courier) {
                    var id_layanan = courier.service;
                    var cost = courier.cost[0].value;
                    var desc = courier.description;

                    var option = "<option value='"+id_layanan+"'>"+id_layanan+ "("+desc+")</option>"; 
                    $("#service").append(option);
                    
                });
            }    
        });
    });

    $("#state").on('change',function(){
        var val = $(this).val();
        if( val == "DP"){
            $("#pengerjaan").val("");

            $("#pengerjaan").attr('readonly',false);
        } else if(val == "LUNAS"){
            $("#pengerjaan").val( $("#total").val() );
            
        }
    });

    $("#pengiriman").on('change',function(){
        var val = $(this).val();
            $("#pengiriman").val( $("#cost").val() );
        
    });

});


        //    var menuitems = document.getElementById("menuitems");
        //    menuitems.style.maxHeight = "0px";
        //    function menutoggle(){
        //        if (menuitems.style.maxHeight == "0px") {
        //            menuitems.style.maxHeight = "200px";
        //        } else{
        //            menuitems.style.maxHeight = "0px";
        //        }
        //    }
        //    function read(){
        //        location.href = "#small-container";
        //    }
       </script>
@endpush