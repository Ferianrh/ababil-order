@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/jersey.css')}}">
@endpush

@section('content')
    <div class="container">
        @include('templates.partials._navbar-user') 
    </div>
    <br>
        <br>
    <div class="container">
    
       
        <div class="row">
            <div class="col-md-4">
                <h1>Bring Your Style With <br> TSTL - <a style="color: red">A</a>babil Sublime Printing</h1>
                <p style="font-family: sans-serif">Lestarikan Kebudayaan dan tanamkan rasa Nasionalisme pada diri kalian dengan <br>Apparel dari TSTL - Ababil Sublime Printing yang dibungkus dengan teknologi dan modernisasi.</p>
            </div>
            <div class="col-md-4 d-sm-none d-md-block d-none d-sm-block">
                <img src="{{asset('assets/images/examples/image1.png')}}" height="302"> 
            </div>
        </div>
    </div>
    <div class="container">
        <H3 class="text-center mt-4">Newest Products</H3>
        <div class="row content mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="row content-isi">    
                    <div class="col-4">
                        <div class="card bg-jersey text-dark" >
                            <img src="{{asset('assets/images/examples/A.jpeg')}}">
                            <hr>
                            <div class="card-body">
                                <center><h5 class="card-title">
                                    Paket A
                                </h5></center>
                                <p class="card-text">
                                    Full set, atas full printing, nomor celana polyflex/sablon/bordir
                                </p>
                                <a href="#" class="btn btn-primary btn-card">Beli</a>
                                <p class="float-right" >135.000</p>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="col-4 ">
                        <div class="card bg-jersey text-dark" >
                            <img src="{{asset('assets/images/examples/A.jpeg')}}">
                            <hr>
                            <div class="card-body">
                                <center><h5 class="card-title">
                                    Paket B
                                </h5></center>
                                <p class="card-text">
                                    Full set, printing depan belakang, lengan kain, nomor celana polyflex/sablon/bordir
                                </p>
                                <a href="#" class="btn btn-primary btn-card">Beli</a>
                                <p class="float-right" >127.500</p>
                            </div>  
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card bg-jersey text-dark" >
                            <img src="{{asset('assets/images/examples/A.jpeg')}}">
                            <hr>
                            <div class="card-body">
                                <center><h5 class="card-title">
                                    Paket C
                                </h5></center>
                                <p class="card-text">
                                    Printing depan saja, nama dan no punggung sablon poliflex/sablon, nomor celana sablon poliflex/sablon
                                </p>
                                <a href="#" class="btn btn-primary btn-card">Beli</a>
                                <p class="float-right" >127.500</p>
                            </div>  
                        </div>
                    </div>
                </div>
                
                <div class="row content-isi">    
                    <div class="col-4">
                        <div class="card bg-jersey text-dark" >
                            <img src="{{asset('assets/images/examples/A.jpeg')}}">
                            <hr>
                            <div class="card-body">
                                <center><h5 class="card-title">
                                    Paket A
                                </h5></center>
                                <p class="card-text">
                                    Full set, atas full printing, nomor celana polyflex/sablon/bordir
                                </p>
                                <a href="#" class="btn btn-primary btn-card">Beli</a>
                                <p class="float-right" >135.000</p>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="card bg-jersey text-dark" >
                            <img src="{{asset('assets/images/examples/A.jpeg')}}">
                            <hr>
                            <div class="card-body">
                                <center><h5 class="card-title">
                                    Paket B
                                </h5></center>
                                <p class="card-text">
                                    Full set, printing depan belakang, lengan kain, nomor celana polyflex/sablon/bordir
                                </p>
                                <a href="#" class="btn btn-primary btn-card">Beli</a>
                                <p class="float-right" >127.500</p>
                            </div>  
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card bg-jersey text-dark" >
                            <img src="{{asset('assets/images/examples/A.jpeg')}}">
                            <hr>
                            <div class="card-body">
                                <center><h5 class="card-title">
                                    Paket C
                                </h5></center>
                                <p class="card-text">
                                    Printing depan saja, nama dan no punggung sablon poliflex/sablon, nomor celana sablon poliflex/sablon
                                </p>
                                <a href="#" class="btn btn-primary btn-card">Beli</a>
                                <p class="float-right" >127.500</p>
                            </div>  
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row justiy-content-md-center ">
            <div class="col-md-8 col-md-offset-2 mb-4">
                <div class="p-5 bg--white border--radius">
                    <h3 class="text-center">Ukuran Jersey</h3>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Ukuran 
                                </th>
                                <th>
                                    Panjang
                                </th>
                                <th>
                                    Lebar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                               <tr>
                                   
                                   <td>S</td>
                                   <td>69</td>
                                   <td>48</td>
                                   
                               </tr>
                               <tr>
                                   
                                   <td>M</td>
                                   <td>72</td>
                                   <td>50,5</td>
                               </tr>
                               <tr>
                                   
                                   <td>L</td>
                                   <td>75</td>
                                   <td>53</td>
                               </tr>
                               <tr>
                                   
                                   <td>XL</td>
                                   <td>76,5</td>
                                   <td>55,5</td>
                               </tr>
                               <tr>
                                   
                                   <td>XXL</td>
                                   <td>80,5</td>
                                   <td>58,5</td>
                               </tr>
                               <tr>
                                  
                                   <td>XXXL</td>
                                   <td>82</td>
                                   <td>63,5</td>
                               </tr>
                           </tbody>
                    </table>    
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