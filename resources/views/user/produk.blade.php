@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/jersey.css')}}">
@endpush

@section('content')
    <div class="container ">
        @include('templates.partials._navbar-user') 
        <br>
        <br>
        <div class="row mb-4" style="background-color: #f6f7fb; border-radius:5px; ">
            <div class="col-md-8 col-md-offset-2 mb-4">
                <h2 class="text-center">Jenis Kain</h2>
                <div class="row" >
                    @foreach($kain as $row)
                        <div class="col-4 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <h5>{{$row->nama_kain}}</h5>
                                    </div>
                                    <div class="card-text text-center">
                                        {{$row->deskripsi_kain}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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