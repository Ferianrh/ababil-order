@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/setting.css')}}">
@endpush

@section('content')

    <div class="container">
        @include('templates.partials._navbar-user')
    </div>
    <section>
        <div class="row justiy-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="p-5 border--radius">
                @if($pesan = Session::get('msg'))
                <div class="alert alert-danger alert-dismissable">
                <strong>{{ $pesan }}</strong>
                <button type="button" class="close" data-dismiss="alert">x</button>
                </div>
                @endif
                    <h3 class="mt-0 txt-bold">Edit Profil</h3>
                    <form action="{{route('setting.update',Auth::user()->id)}}" method="POST" class="mt-4">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id_pelanggan" value="{{Auth::user()->pelanggan->id_pelanggan}}">
                        <h4 class="h4"><u>Basic</u></h4>
                        <div class="form-group">
                            <label>Username <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" name="username"  value="{{Auth::user()->username}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="{{Auth::user()->pelanggan->nama_lengkap}}">
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span> :</label>
                            <input type="email" class="form-control" name="email" value="{{$pelanggan->email}}" disabled>
                        </div>
                        <br>
                        <h4 class="h4 "><u>Profile</u></h4>
                        <div class="form-group">
                            <label >Tanggal Lahir</label>
                            <input type="date"class="form-control" name="tanggal_lahir" value="{{Auth::user()->pelanggan->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <div class="form-group">
                                <select name="provinsi" id="prov" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <select name="kota" id="city" class="form-control">

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" name="alamat_lengkap" value="{{$pelanggan->alamat_lengkap}}">
                        </div>
                        <div class="form-group">
                            <label>Kode Pos <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" name="kode_pos" value="{{$pelanggan->kode_pos}}">
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="text" class="form-control" name="no_hp" value="{{$pelanggan->no_hp}}">
                        </div>
                        <br>
                        <h4 class="h4"><u>Ubah Kata Sandi</u></h4>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Kata Sandi</label>
                            <input type="password" name="confirm_pass" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-md float-right">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!-- tampilkan barang -->

   @include('templates.partials._footer')
@endsection

@push('scripts')
@include('templates.partials._scriptsuser')


<script type="text/javascript">
$(document).ready(function(){
    $.get({
        url:"{{url('/getProvince')}}",
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){

                        var id = response[i]['id_provinsi'];
                        var name = response[i]['nama_provinsi'];

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#prov").append(option);
                    }
                }
        });

    $("#prov").val("{{$pelanggan->id_provinsi}}");

    var prov = "{{$pelanggan->id_provinsi}}";
    // console.log(prov);

    $.get({
        url:"{{url('/getCity')}}/"+prov,
        type:'get',
        dataType: 'json',
        data: {
                "_token": "{{ csrf_token() }}",
            },
        success:function(response){
            var len = 0;
            len = response.length;
            for(var i=0; i<len; i++){
                
                var id = response[i]['id_kota'];
                var name = response[i]['nama_kota'];

                var option = "<option value='"+id+"'>"+name+"</option>"; 
                $("#city").append(option);
            }
        }
    });

    $("#prov").on('change',function(){
    var prov = $(this).val();
        $.get({
                url:"{{url('/getCity')}}/"+prov,
                type:'get',
                dataType: 'json',
                data: {
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    $("#city option").each(function(){
                            $(this).remove();
                        });
                    var len = 0;
                    len = response.length;
                    for(var i=0; i<len; i++){
                        
                        var id = response[i]['id_kota'];
                        var name = response[i]['nama_kota'];

                        var option = "<option value='"+id+"'>"+name+"</option>"; 
                        $("#city").append(option);
                    }
                }
        });
    });
});

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