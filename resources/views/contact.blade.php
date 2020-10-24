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
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Contact</h1>
                <div class="row">
                    <div class="col-md-6">
                        <form action="">
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    

 <!-- tampilkan barang -->

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