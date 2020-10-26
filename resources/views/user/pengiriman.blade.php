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
                    <h3 class="mt-0">Data pengirimana</h3>
                    <form action="">
                    <div class="form-group">
                        <label for="comment">Alamat Pengirim</label>
                        <hr>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <button type="button" class="btn btn-light p-2">Pilih Alamat Lain</button>

                    <div class="form-group mt-4 ">
                        <div class="row">
                            <div class="col-md-3  " >
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
                                <label for="comment">Opso Pemesanan</label>
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
                        <div class="row mt-3">
                            <div class="col-md-3  " >
                                <select class="custom-select" id="validationCustom04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-3 " >
                                <p class="text-center">Reguler</p>
                            </div>
                            <div class="col-md-3 " >
                                <p  class="text-center"></p>
                            </div>
                            <div class="col-md-3 " >
                                <p class="text-right">Rp7.000</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group mt-4 ">
                        
                        
                        <div class="row">
                            <div class="col-md-3  " >
                                <label for="comment">Opso Pemesanan</label>
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