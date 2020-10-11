@extends('templates.default')
@push('style')
<link rel="stylesheet" href="{{asset('dist/css/jersey.css')}}">
@endpush

@section('content')
    <div class="container">
        @include('templates.partials._navbar-user')
        
    </div>
    <div class="container">
        <div class="row content">
            <div class="col-md-10 offset-md-1">
                <div class="row">    
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('assets/images/examples/product-4.jpg')}}">
                            <div class="card-body">Content</div>
                            <div class="card-footer">Footer</div>
                        </div>
                    </div>
                    <div class="col-4">
                    <div class="card bg-primary text-white " style="width: 18rem;">
                            <img src="{{asset('assets/images/examples/product-4.jpg')}}">
                            <div class="card-body">Content</div>
                            <div class="card-footer">Footer</div>
                        </div>
                    </div>
                    <div class="col-4">
                    <div class="card bg-primary text-white" style="width: 18rem;">
                            <img src="{{asset('assets/images/examples/product-4.jpg')}}">
                            <div class="card-body">Content</div>
                            <div class="card-footer">Footer</div>
                        </div>
                    </div>
                </div>
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