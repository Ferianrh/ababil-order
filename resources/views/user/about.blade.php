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
            <div class="col-md-6">
                <h1 class="text-center">Ababil<br> Sublime Printing</h1>
                <p style="font-size: 17px;" class="text-center" >Ababil Sublime Printing dan Jersey adalah usaha yang bergerak dibidang 
                    pembuatan baju dan jasa printing kain. Ababil Sublime Printing dan Jersey 
                    melayani beberapa permintaan dari customer. Ababil Sublime Printing dan
                    Jersey yang merupakan anak perusahaan dari Konveksi Ababil berlokasi di 
                    <a style="color:blue;" href="https://maps.app.goo.gl/BVyDSsSM3dcP9kHXA">Jl.Tanjung Manis No.71, Manisrejo, Kec. Taman, Kota Madiun, Jawa Timur 63138
                    </a>
                </p>
            </div>
            
        </div>
    </div>
    

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