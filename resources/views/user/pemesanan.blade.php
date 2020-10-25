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
   
    
    <div class="row justiy-content-md-center ">
        <div class="col-md-8 mt-4 mb-4">
            <div class="p-5 bg--white border--radius">
            <h2 class="mt-0 text-center">Form Pemesanan Paket</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_paket" value="{{$katalog->id_paket}}">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Paket:  </label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$katalog->nama_paket}}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi Paket:  </label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$katalog->deskripsi_paket}}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Ilustrasi :</label>
                        <div class="col-sm-9">
                            <img class="rounded img-thumbnail img-fluid d-block p-2" src={{URL::asset("assets/images/examples/$katalog->gambar_desain")}} width=200px alt="ilustrasi.jpg" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga Paket/pcs:  </label>
                        <div class="col-sm-9">
                            <input type="text" value="{{format_rupiah($katalog->harga_paket)}}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-check-label"> Jenis Lengan <span class="text-danger">*</span>:</label>
                        </div>

                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_lengan" id="lengan1" value="Lengan Panjang">
                                <label class="form-check-label" for="lengan1">Lengan Panjang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_lengan" id="lengan2" value="Lengan Pendek">
                                <label class="form-check-label" for="lengan2">Lengan Pendek</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="control-label col-sm-3">Jenis Jahit <span class="text-danger">*</span>:</label>
                        <div class="col-sm-9">
                            <select name="jenis_jahit" id="jenis_jahit" class="form-control">
                                @foreach($jenis as $row)
                                    <option value="{{$row->id_jenis}}">{{$row->nama_jahit}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3">Jenis Ukuran <span class="text-danger">*</span>:</label>
                        <div class="col-sm-9">
                            <select name="jenis_ukuran" class="form-control" id="jenis_ukuran">
                                <option selected disabled>--Jenis Ukuran--</option>
                                <option value="Dewasa">Dewasa</option>
                                <option value="Kids (SSB)">Kids (SSB)</option>
                                <option value="SD/TK">SD/TK</option>
                            </select>
                        </div>
                    </div>
                    <label for="">Ukuran <span class="text-danger">*</span>:</label>
                    <div class="form-group row justiy-content-md-center">
                        <!-- <div class="col-sm-10">
                            <div class="form-check row mb-1">
                                <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                S
                                </label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="jumlah" >
                                </div>
                                <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                XL
                                </label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="jumlah">
                                </div>
                            </div>
                            
                            <div class="form-check row mb-1">
                                <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                M
                                </label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="jumlah">
                                </div>
                                <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                XXL
                                </label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="jumlah">
                                </div>
                            </div>
                            
                            <div class="form-check row mb-1">
                                <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                L
                                </label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="jumlah">
                                </div>
                                <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                XXXL
                                </label>
                                </div>
                                <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="jumlah">
                                </div>
                            </div>
                            
                        </div>     -->
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Desain</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Nomer celana + Nama"></textarea>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Penerima <span class="text-danger">*</span>:</label>
                        <div class="col-sm-10">
                            <input type="Text" name="nama_lengkap" class="form-control" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                        
                </form>
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
                   menuitems.style.maxHeight = "250px";
               } else{
                   menuitems.style.maxHeight = "0px";
               }
           }
           function read(){
               location.href = "#small-container";
           }
       </script>
@endpush