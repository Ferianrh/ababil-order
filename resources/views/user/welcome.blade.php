@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/jersey.css')}}">
@endpush

@section('content')
    <div class="container">
        @include('templates.partials._navbar-user') 
        <br>
        <br>
        <div class="row">
            <div class="col-4">
                <h1>Bring Your Style With <br> TSTL - <a style="color: red">A</a>babil Sublime Printing</h1>
                <p style="font-family: sans-serif">Lestarikan Kebudayaan dan tanamkan rasa Nasionalisme pada diri kalian dengan <br>Apparel dari TSTL - Ababil Sublime Printing yang dibungkus dengan teknologi dan modernisasi.</p>
            </div>
            <div class="col-4">
                <img src="{{asset('assets/images/examples/image1.png')}}"> 
            </div>
        </div>
    </div>
    <div class="container">
        <H3 class="text-center mt-4">Newest Products</H3>
        <div class="row content mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="row content-isi">    
                    @foreach($katalog as $row)
                        <div class="col-4 mt-3">
                            <div class="card bg-jersey text-dark" >
                                <img src={{ URL::asset("assets/images/examples/$row->gambar_desain") }} width="150" alt="">
                                <hr>
                                <div class="card-body">
                                    <center><h5 class="card-title">
                                        {{$row->nama_paket}}
                                    </h5></center>
                                    <p class="card-text">
                                        {{$row->deskripsi_paket}}
                                    </p>
                                    <a href="{{route('pesan.index')}}" class="btn btn-primary btn-card">Beli</a>
                                    <p class="float-right" >{{ format_rupiah($row->harga_paket) }}</p>
                                </div>  
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

 <!-- tampilkan barang -->

 <!-- tampilkan barang -->

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