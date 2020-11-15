@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/setting.css')}}">
    <!-- {{-- aditional style --}} -->
@endpush
@section('content')
<div class="bg--secondary">

    <div class="container">
        @include('templates.partials._navbar-user') 
        <br>
        <br>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 mt-4 mb-4">
                <div class="p-4 bg--white border--radius">
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

                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kota</label>
                            <select name="kota" id="city" class="form-control col-sm-9">

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
                            <option value="" disabled selected>--Pilih Kurir--</option>
                                @foreach($courier as $row)
                                    <option value="{{$row->kode_kurir}}">{{$row->nama_kurir}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Jenis Layanan <spant class="text-danger">*</spant>:</label>
                            <select name="jenis_pengiriman" id="service" class="form-control col-sm-5">
                               
                            </select>

                            <label class="control-label col-sm-1">Harga :</label>
                            <input type="text" value="" id="cost" name="biaya_pengiriman" class="form-control col-sm-3" readonly required>
                        </div>
                        <?php $berat = ($detailOrder->sum('jumlah') / 12) * 2000 ?>
                        <input type="hidden" name="berat" value="{{$berat}}" id="berat">
                        <p class="text-warning">Note: Berat akan di asumsikan 1 lusin = 2kg</p>
                        
                    <!-- <button type="button" class="btn btn-light p-2">Pilih Alamat Lain</button> -->

                    <div class="form-group mt-4">
                        <div class="row">
                        @if($order->pesanan->id_paket != 2)
                            <div class="col-md-3">
                                <label for="comment">Produk Dipesan</label>
                            </div>
                        @else
                            <div class="col-md-3">
                                <label for="comment">Sisi Print</label>
                            </div>
                        @endif
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
                        @if($order->pesanan->id_paket != 2)
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
                        @else
                            <div class="col-md-3  " >
                                <img src="{{asset('assets/images/pesan')}}/{{$order->pesanan->custom_desain}}" width="40" height="40">
                                <p style="display:inline-block; margin-left:15px;">{{$order->customPrint->sisiPrint->keterangan_print}}</p>
                            </div>
                            <div class="col-md-3 " >
                            @foreach($detailOrder as $row)
                                <p class="text-center">{{ format_rupiah($row->customPrint->harga) }}</p>
                            @endforeach
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
                                <p  class="text-right">{{ format_rupiah($row->jumlah * $row->customPrint->harga) }}</p>
                            @endforeach
                            </div>
                            <?php $totalPesan = 0;?>
                            @foreach($detailOrder as $row)
                            <?php
                                $totalPesan = $totalPesan + ($row->jumlah * $row->customPrint->harga) ;
                            ?>
                            @endforeach
                            
                        @endif
                        </div>
                        
                    </div>
                    
                    <div class="form-group mt-4 ">
                        @if($order->pesanan->id_paket != 2)
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
                        @endif


                        <div class="row">
                        @if($order->pesanan->id_paket != 2)
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
                        @endif
                            
                        </div>
                        <div class="row mt-3 mb-3">
                            
                            <div class="col-md-9 " >
                                <p  class="text-right">Total:</p>
                            </div>
                            <div class="col-md-3 " >
                            @if($order->pesanan->id_paket != 2)
                                <p class="text-right">{{format_rupiah($totalPesan + $totalLengan + $totalGrade)}}</p>
                                <input type="hidden" value = "{{$totalPesan + $totalLengan + $totalGrade}}" id="total">
                            @else
                                <p class="text-right">{{format_rupiah($totalPesan )}}</p>
                                <input type="hidden" value = "{{$totalPesan}}" id="total">
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col-md-9 " >
                                <p  class="text-right" >Grand Total:</p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="text-right" id="grand"></p>
                                <input type="hidden" name="grand_total" value = "" id="grandTotal">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Lanjut ke Pembayaran <i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('templates.partials._footer')

@endsection

@push('scripts')
@include('templates.partials._scriptsuser')

<script type="text/javascript">

function convertToRupiah(angka)
{
    var rupiah = '';		
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

$(document).ready(function(){
    $.get({
        url:"{{url('/getProvince')}}",
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){

                        var id = response[i]['id_provinsi'];
                        var name = response[i]['nama_provinsi'];

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#prov").append(option);
                    }
                }
        });

    $("#prov").val("{{$order->pelanggan->id_provinsi}}");

    var prov = "{{$order->pelanggan->id_provinsi}}";
    // console.log(prov);

    $.get({
        url:"{{url('/getCity')}}/"+prov,
        type:'get',
        dataType: 'json',
        data: {
                "_token": "{{ csrf_token() }}",
            },
        success:function(response){
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

    var courier = $(this).val();
       var cityId = $('#city').val();
       $.ajax({
            url:"{{route('rajaongkir.service')}}",
            type:'POST',
            // dataType: 'json',
            data: 
                {
                    // "kota": cityId, 
                    // "kurir": courier,
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


                    var option = "<option value='"+id_layanan+"'>"+id_layanan+" ("+desc+")</option>"; 
                    $("#service").append(option);
                    
                });
            }    
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

    $("#service").on("change",function(){
       var courier = $("#courier").val();
       var cityId = $('#city').val();
       var layanan = $(this).val();
       var berat = $("#berat").val();
       $.ajax({
            url:"{{route('rajaongkir.cost')}}",
            type:'POST',
            // dataType: 'json',
            data: 
                {
                    "kota": cityId, 
                    "kurir": courier,
                    "berat": berat,
                    "_token": "{{ csrf_token() }}",
                    
                },
            success:function(response){
               
                var services = response.costs;
                // for(var i=0; i<len; i++){
                services.forEach(function (courier) {
                    // var id_layanan = courier.service;
                   if(courier.service == layanan){
                    var cost = parseInt(courier.cost[0].value);
                    var total = parseInt($("#total").val());
                    var grand = 0;
                    grand = cost+total;
                    // console.log(cost);
                    $("#cost").val(cost);
                    $("#grand").text(convertToRupiah(grand));
                    $("#grandTotal").val(grand);

                   }
                });
            }    
        });
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