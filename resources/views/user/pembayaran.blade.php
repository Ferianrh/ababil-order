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
                    <div class="form-group ">
                        <h3>Status Pembayaran</h3>
                        <div class="row">
                            <label for="" class="col-sm-3">Biaya Pengerjaan :</label>
                            @if($payment->sudah_dibayar==null)
                            <div class="col-sm-9 ">
                                <button class="bg-danger text-white rounded ">BELUM DIBAYAR</button>                                
                            </div>
                            @elseif($payment->sudah_dibayar==$payment->total_pembayaran)
                            <div class="col-sm-9 ">
                                <button class="bg-success text-white rounded ">LUNAS</button>                                
                            </div>
                            @else
                            <div class="col-sm-9 ">
                                <button class="bg-warning rounded ">DP ({{$payment->sudah_dibayar}})</button>                                
                            </div>
                            @endif
                        </div>
                    </div>
                    <h3 class="mt-0">Data pengiriman</h3>
                    <form action="{{ route('pembayaran.update', $payment->id_pembayaran) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                        <input type="hidden" name="id_pesanan" value="{{$order->id_pesanan}}">
                       
                        <div class="form-group row">
                            <label class="control-label col-sm-3">Nama </label>
                            <p class="col-sm-9">: {{$order->pelanggan->nama_lengkap}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Email</label>
                            <p class="col-sm-9">: {{$order->pelanggan->email}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">No Hp</label>
                            <p class="col-sm-9">: {{$order->pelanggan->no_hp}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Provinsi</label>
                            <p class="col-sm-9">: {{$pengiriman->provinsi->nama_provinsi}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kota</label>
                            <p class="col-sm-9">: {{$pengiriman->kota->nama_kota}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Alamat Lengkap</label>
                            <p class="col-sm-9">: {{$pengiriman->alamat_pengiriman}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kode Pos</label>
                            <p class="col-sm-9">: {{$pengiriman->kode_pos}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Kurir </label>
                            <p class="col-sm-9">: {{$pengiriman->kurir->nama_kurir}}</p>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3">Jenis Layanan</label>
                            <p class="col-sm-2">: {{$pengiriman->jenis_pengiriman}}</p>

                            <label class="control-label col-sm-1">Harga</label>
                            <p class="col-sm-3 ">: {{format_rupiah($pengiriman->biaya_pengiriman)}}</p>
                            <div class="offset-sm-3"></div>
                        </div>
                        
                        <!-- <p class="text-warning">Note: Berat akan di asumsikan 1 lusin = 2kg</p> -->
                        
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
                                <p class="text-right" id="grand">{{format_rupiah($payment->total_pembayaran)}}</p>
                                <input type="hidden" name="grand_total" value = "{{$payment->total_pembayaran}}" id="grandTotal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label">Upload Bukti Pembayaran : </label>
                        <input type="file" class="form-control" id="image-source" name="image" accept="image/*" onchange="previewImage();" required>
                        @if(isset($payment->bukti_pembayaran))
                            <img id="image-preview" src="{{ asset('assets/images/pembayaran')}}/{{$payment->bukti_pembayaran}}" class=" rounded img-fluid d-block p-2" width="200">
                        @endif
                        <img id="image-preview" src="" class=" rounded img-fluid d-block p-2" width="200">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan <i class="fa fa-save"></i></button>
                    <div class="clearfix"></div>
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

function previewImage() {
        document.getElementById("image-preview").style.display = "block"; 
        document.getElementById("image-preview").style.width = "200";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
};
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