@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/setting.css')}}">
@endpush

@section('content')

<div class="bg--secondary">
    <div class="container">
        @include('templates.partials._navbar-user')
    </div>
    <section>
    <div class="container">
        <div class="row justiy-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="p-5 bg--white border--radius">
                    <h1 class="mt-0">Edit Profil</h1>
                    <form action="" class="mt-4">
                        <input type="hidden" name="id-pelanggan" value="{{Auth::user()->username}}">
                        <h3>Basic</h3>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" value="acak">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" value="acak">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" id="exampleInputEmail1" value="adisuprianta13@gmail.com" disabled>
                        </div>
                        <H3>Profile</H3>
                        <div class="form-group">
                            <label >Tanggal Lahir</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" value="pondok maritim lama">
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" value="081936124448">
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" value="surabaya">
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" value="Jawa Timur">
                        </div>
                        <H3>Ubah Kata Sandi</H3>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary btn--lg">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
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