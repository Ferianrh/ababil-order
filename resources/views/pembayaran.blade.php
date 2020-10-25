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
   
    <div class="container ">
        <div class="row justiy-content-md-center ">
            <div class="col-md-8 col-md-offset-2 mt-4 mb-4">
                <div class="p-5 bg--white border--radius">
                    <h1 class="mt-0 text-center">Halaman Pembayaran</h1>
                    <h3>Detail Pelanggan</h3>
                    <div class="table-responsive">
                    <table class="table table-borderless">

                        <tr>
                            <td>Nomor Pesanan</td>
                            <td>:</td>
                            <td>12312s3123</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>santri</td>
                        </tr>
                        <tr>
                            <td>Nomor Hp</td>
                            <td>:</td>
                            <td>081936124448</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>18410100140@dinamika.ac.id</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>Halooo</td>
                        </tr>
                        <tr>
                            <td>Alamat Pengirim</td>
                            <td>:</td>
                            <td>Suwug,kec. sawan, kab. buleleng, bali</td>
                        </tr>
                    </table>    
                    </div>
                    <h3>Detail Pesanan</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>
                                        Jenis Paket
                                    </th>
                                    <th>
                                        Ukuran
                                    </th>
                                    <th>
                                        Jumlah Pesanan
                                    </th>
                                    <th>
                                        Harga Satuan
                                    </th>
                                    <th>
                                        Sub Total
                                    </th>
                                </tr>
                            </thead>
                           <tbody>
                               <tr>
                                   <td rowspan="6"></td>
                                   <td>S</td>
                                   <td>10</td>
                                   <td>100</td>
                                   <td>1000</td>
                               </tr>
                               <tr>
                                   
                                   <td>M</td>
                                   <td>10</td>
                                   <td>100</td>
                                   <td>1000</td>
                               </tr>
                               <tr>
                                   
                                   <td>L</td>
                                   <td>10</td>
                                   <td>100</td>
                                   <td>1000</td>
                               </tr>
                               <tr>
                                   
                                   <td>XL</td>
                                   <td>10</td>
                                   <td>100</td>
                                   <td>1000</td>
                               </tr>
                               <tr>
                                   
                                   <td>XXL</td>
                                   <td>10</td>
                                   <td>100</td>
                                   <td>1000</td>
                               </tr>
                               <tr>
                                  
                                   <td>XXXL</td>
                                   <td>10</td>
                                   <td>100</td>
                                   <td>1000</td>
                               </tr>
                           </tbody>

                            
                        </table>    
                    </div>
                    
                    <div class="table-responsive mt-1">

                        <table class="table table-borderless">
                           <tbody>
                               <tr>
                                   <td>Sub Total Semua Produk</td>
                                   <td class="text-right" width = "10px">:</td>
                                   <td class="text-right" width = "15%"> 1020103</td>
                                   
                               </tr>
                               <tr>
                                   <td>Sub Total Biaya Pengiriman</td>
                                   <td class="text-right" width = "10px">:</td>
                                   <td class="text-right" width = "15%"> 1020103</td>
                                   
                               </tr>
                               <tr>
                                   <td>Total Pembayaran</td>
                                   <td class="text-right" width = "10px">:</td>
                                   <td class="text-right" width = "15%"> 1020103</td>
                                   
                               </tr>
                           </tbody>

                            
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

    @include('templates.partials._footer')

<!-- tampilkan barang -->

   @include('templates.partials._footer')

@endsection

@push('scripts')
@include('templates.partials._scripts-user')

<script type="text/javascript">
           var menuitems = document.getElementById("menuitems");
           menuitems.style.maxHeight = "0px";
           function menutoggle(){
               if (menuitems.style.maxHeight == "0px") {
                   menuitems.style.maxHeight = "200px";
               } else{
                   menuitems.style.maxHeight = "0px";
               }
           }
           function read(){
               location.href = "#small-container";
           }
       </script>
@endpush