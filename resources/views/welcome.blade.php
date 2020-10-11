@extends('templates.default')
@push('style')
    {{-- aditional style --}}
@endpush

@section('content')
    <div class="container">
        @include('templates.partials._navbar-user')
        <div class="row">
                <div class="col-2">
                    <h1>Bring Your Style With <br> TSTL - <a style="color: red">A</a>babil Sublime Printing</h1>
                    <p style="font-family: sans-serif">Lestarikan Kebudayaan dan tanamkan rasa Nasionalisme pada diri kalian dengan <br>Apparel dari TSTL - Ababil Sublime Printing yang dibungkus dengan teknologi dan modernisasi.</p>
                    <a href="" class="btn btn-welcome btn-primary" onclick="read();">Baca Lebih</a>
                </div>
                <div class="col-2">
                    <img src="{{asset('assets/images/examples/image1.png')}}"> 
                </div>
            </div>
    </div>

 <!-- tampilkan barang -->

    @include('templates.partials._footer')
@endsection

@push('scripts')
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