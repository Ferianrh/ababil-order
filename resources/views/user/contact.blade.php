@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{secure_asset('dist/css/contact.css')}}">
@endpush

@section('content')
    <div class="container ">
        @include('templates.partials._navbar-user') 
        <br>
        <br>
        <div class="row mb-4" style="background-color: #f6f7fb; border-radius:5px; ">
            <div class="col-md-8 col-md-offset-2 mb-4">
                <h1 class="text-center">Contact</h1>
                <div class="row">
                    <div class="col-md-6">
                         <h3>Konsultasi</h3>
                    </div>
                    <div class="col-md-6">
                        <h3>Hal Yang Perlu Diketahui</h3>
                    </div>
                </div>
                <div class="row" >
                    
                    <div class="col-md-6" hight="400">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Website atau Sosial Media">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Pesan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    <div class="col-md-6 " hight="400">
                        
                        <div class="contact-isi">
                            <Label>Alamat</Label>
                            <p>
                                <a href="https://maps.app.goo.gl/BVyDSsSM3dcP9kHXA">Jl.Tanjung Manis No.71, Manisrejo, Kec. Taman, Kota Madiun, Jawa Timur 63138</a> 
                            </p>
                            <label for="">No Telepon</label>
                            <p><i class="fa fa-phone mr-2"></i> 0822-3310-8896</p>
                            <label for="">Instagram :</label>
                            <p><a href="https://www.instagram.com/ababil.sublime/"><i class="fa fa-instagram mr-2"></i>ababil.sublime</a></p>
                            <label for="">Facebook</label>
                            <p><i class="fa fa-facebook mr-2"></i></p>

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