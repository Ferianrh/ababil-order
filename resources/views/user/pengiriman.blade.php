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
                    <form action="">
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Nama <span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control col-sm-9" name="nama_pelanggan" value="{{$order->pelanggan->nama_lengkap}}">
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Email <span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control col-sm-9" name="nama_pelanggan" value="{{$order->pelanggan->email}}">
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">No Hp <span class="text-danger">*</span>:</label>
                            <input type="text" class="form-control col-sm-9" name="nama_pelanggan" value="{{$order->pelanggan->no_hp}}">
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
                                @foreach($courier as $row)
                                    <option value="{{$row->kode_kurir}}">{{$row->nama_kurir}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Jenis Layanan <spant class="text-danger">*</spant>:</label>
                            <select name="kurir" id="service" class="form-control col-sm-5">
                               
                            </select>

                            <label class="control-label col-sm-1">Harga :</label>
                            <input type="text" value="" id="cost" class="form-control col-sm-3" disabled>
                        </div>

                        
                    <!-- <button type="button" class="btn btn-light p-2">Pilih Alamat Lain</button> -->

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="comment">Produk Dipesan</label>
                            </div>
                            <div class="col-md-3 " >
                                <p class="judul text-center">Harga Satuan</p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="judul text-center">Jumlah</p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="judul text-right">Sub Total</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3  " >
                                <img src="{{asset('assets/images/examples/A.jpeg')}}" width="40" height="40">
                                <p style="display:inline-block; margin-left:15px;">Paket A</p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="text-center">Rp135.000</p>
                            </div>
                            <div class="col-md-3 " >
                                <p  class="text-center">10</p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="text-right">Rp1.350.000</p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group mt-4 ">
                        <div class="row">
                            <div class="col-md-3  " >
                                <label for="comment">Opsi Pemesanan :</label>
                            </div>
                            <div class="col-md-3 " >
                                <p class="judul text-center"></p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="judul text-center"></p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="judul text-left"></p>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            
                            <div class="col-md-9 " >
                                <p  class="text-right">Total:</p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="text-right">Rp1.357.000</p>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-right">Buat Pesanan</button>
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
                        '<option value=""> Select Service </option>');

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
                    // "kota": cityId, 
                    // "kurir": courier,
                    "_token": "{{ csrf_token() }}",
                    
                },
            success:function(response){
                $("#service").empty().append(
                        '<option value=""> Select Service </option>');

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
               
                var services = response.costs;
                // for(var i=0; i<len; i++){
                services.forEach(function (courier) {
                    // var id_layanan = courier.service;
                   if(courier.service == layanan){
                    var cost = courier.cost[0].value;
                    $("#cost").val(cost);
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