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
            @if($katalog->id_paket != 2)
                <form action="{{route('pesan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_paket" value="{{$katalog->id_paket}}">

            @else
                <form action="{{route('pesan.custom')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_paket" value="{{$custom->id_paket}}">
            @endif
                    @if($katalog->id_paket != 2)
                    <div class="bg-light border border-success rounded p-2 mb-3">
                        <h4 class="text-center text-dark">Data Paket</h4>
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
                            <label class="col-sm-3 col-form-label">Minimal Order:  </label>
                            <div class="col-sm-9">
                                <label class="text-normal">1 lusin</label>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="bg-light border border-success rounded p-2 mb-3">
                        <h4 class="text-center text-dark">Data Paket</h4>
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
                                <input type="text" value="Harga akan dihitung setelah pemesanan selesai" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Minimal Order:  </label>
                            <div class="col-sm-9">
                                <label class="text-normal">1 lusin</label>
                            </div>
                        </div>
                    </div>
                    @endif
                    <input type="hidden" name="id_pelanggan" value="{{Auth::user()->pelanggan->id_pelanggan}}">
                    @if($katalog->id_paket != 2)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Grade<span class="text-danger">*</span>:  </label>
                        <div class="col-sm-9">
                        <select name="grade" class="form-control" id="grade">
                                <option value="" disabled selected>--Pilih Grade--</option>
                                <option value="A">Grade A Kain Premium yang tidak ada di menu ( + {{format_rupiah(20000)}})</option>
                                <option value="B">Grade B Memilih Kain di menu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Kain:  </label>
                        <div class="col-sm-9">
                        <select name="id_kain" class="form-control" id="kain">
                                
                        </select>
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

                    @else
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sisi Print:  </label>
                            <div class="col-sm-9">
                            <select name="id_print" class="form-control" id="kain">
                            @foreach($sisi as $row)
                                <option value="{{$row->id_print}}">{{$row->keterangan_print}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mt-3">
                        <label class="control-label col-sm-3">Jenis Jahit <span class="text-danger">*</span>:</label>
                        <div class="col-sm-9">
                            <select name="jenis_jahit" id="jenis_jahit" class="form-control">
                            <option value="" disabled selected>--Pilih Jenis Jahit--</option>
                                @foreach($jenis as $row)
                                    <option value="{{$row->id_jahit}}">{{$row->nama_jahit}}</option>
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
                                <option value="SD TK">SD/TK</option>
                            </select>
                        </div>
                    </div>
                    <p class="text-warning text-sm font-weight-lighter">Note : Centang ukuran yang anda butuhkan</p>

                    <div class="form-group row">
                        <label class="col-sm-3">Ukuran <span class="text-danger">*</span>:</label>
                        <div class="col-sm-9">
                            <div class="row" >
                                <div class="col-6" id="ukuran1">

                                </div>
                                <div class="col-6" id="ukuran2">
                                
                                </div>
                            </div>
                        </div>                  
                    </div>

                    <!-- <div class="form-group row">
                        <div class="col-sm-8 offset-2">
                            <div class="row" >
                                <div class="col-6" id="jumlah1">
                                
                                </div>

                                <div class="col-6" id="jumlah2">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <label class="control-label ">Upload Desain <span class="text-danger">*</span>:</label>
                        <input type="file" class="form-control" id="image-source" name="image" accept="image/*" onchange="previewImage();" required>
                        <img id="image-preview" src="" class="rounded img-fluid d-block p-2" width="200">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Keterangan <span class="text-danger">*</span>:</label>
                        <p class="text-warning text-sm font-weight-lighter"> Note: Pisahkan dengan Koma (contoh: 01-Yuda,02-Alfin, dst ...)</p>
                        <textarea class="form-control" name="keterangan_pesanan" rows="3" placeholder="Nomer - Nama"></textarea>
                    </div>

                    <!-- <input type="checkbox" val="asd" class="cheks"> -->
                    <!-- <label class="form-check-label">H</label> -->
                    <button type="submit" class="btn btn-primary float-right">Lanjut ke Pengiriman <i class="fa fa-arrow-right"></i></button>
                </form>
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
    // $(document).ready(function(){

        function previewImage() {
            document.getElementById("image-preview").style.display = "block"; 
            document.getElementById("image-preview").style.width = "200";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    // });
        $("#jenis_ukuran").on('change',function(){
            // $("#ukuran1").each(function(){
            //     $(this).remove();
            // });
            // $("#ukuran2").each(function(){
            //     $(this).remove();
            // });
            var updateJahit = $("#jenis_jahit").val();
            var jenis = $(this).val();
            $.get({
                url:"{{url('/ukuran')}}/" + updateJahit + "/" + jenis,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    var app = '';
                    var app2='';
                    for(var i=0; i<len; i++){
                        var id = response[i]['id_ukuran'];
                        var name = response[i]['singkatan_ukuran'];
                        // var jenis = response[i]['nama_ukuran'];
                        var row =  "<div class='form-group row'>"
                        var div = "<div class='col-sm-1'>";
                        var cb ="<input class='form-check-input' type='checkbox' name='id_ukuran[]' onclick='enable_form(this)' value='"+ id +"'>";
                        var label = "<label class='form-check-label'>"+ name +"</label>";
                        
                        var input = "<input type='number' name='jumlah[]' id='in"+id+"' class='jumlah form-control col-sm-4' disabled>";
                        var result = row+div+cb+label+"</div>"+input+"</div>";

                        if(id%2 != 0){
                            app+=result;
                            // $("#ukuran1").empty().append(result);
                            // $("#ukuran1").append(result); 
                            // $("#basicform #short").append(option);
                        }else{
                            app2+=result;
                            // $("#ukuran2").empty().append(result);
                            // $("#ukuran2").append(result); 
                        }
                    }
                    $("#ukuran2").empty().append(app2);
                    $("#ukuran1").empty().append(app);
                }
            });
        });

        $("#grade").on('change',function(){
            var grade = $(this).val();
            $.get({
                url:"{{url('/getKain')}}",
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    if(grade=="A"){
                        $("#kain").empty().append(
                        '<option value="1">Kain Premium</option>');
                    }else{
                        $("#kain").empty().append(
                        '<option value="" disabled >Pilih Kain</option>');
                    }
                    var len = 0;
                    len = response.length;
                    if(grade=="B"){
                        for(var i=0; i<len; i++){
                            var id = response[i]['id_kain'];
                            var name = response[i]['nama_kain'];
                            var option = "<option value='"+id+"'>"+name + "</option>"; 
                            $("#kain").append(option); 
                            // $("#basicform #short").append(option);
                        }
                    }
                }
            });
        });

        function enable_form(tes) {
            var id = $(tes).val();
            if (tes.checked) {
                
                $('#in'+id ).prop("disabled",false);
            } else {
                $('#in'+id).prop("disabled",true);
                // alert('ha');
            }

            // if(tes.checked == false){
            //     $('#in'+id).prop("disabled",true);

            // }
        }
        // $("#ukuran .cheks").change(function(){
        //     var updateUkuran = $(this).val();
        //     alert("checked");

        // });

    // });

</script>
@endpush