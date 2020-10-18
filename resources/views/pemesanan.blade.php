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
   
    <div class="container ">
        <div class="row justiy-content-md-center ">
            <div class="col-md-8 col-md-offset-2 mt-4 mb-4">
                <div class="p-5 bg--white border--radius">
                <h1 class="mt-0 text-center">Form Pemesanan</h1>
                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="Text" class="form-control" >
                            </div>
                        </div>
                        
                        <Label>Ukuran</Label>
                        <div class="form-group row justiy-content-md-center">
                            <div class="col-sm-10">
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
                                
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Desain</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Nomer celana + Nama"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

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