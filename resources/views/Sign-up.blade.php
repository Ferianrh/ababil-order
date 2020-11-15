@extends('templates.default')
@push('style')
    <link rel="stylesheet" href="{{asset('dist/css/login.css')}}">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 form-sign-in">
                <div class="row">
                    <div class="col-md-4 form-label d-none d-sm-block">
                        <h1>Selamat Datang!</h1>
                        <p>Silahkan daftar bersama kami dan kenali serta lestarikan budaya Indonesia dengan Produk dari TSTL-<a style="color: red;">C</a>oolture.ID </p>
                        <!-- <button class="ghost" id="signIn">Sign In</button> -->
                        <a href=""  class="btn btn-sign ">Sign In</a>
                    </div>
                    <div class="col-md-5 ">
                        <form action="{{route('signUp')}}" method="POST">
                                @csrf
                            <h1>Create Account</h1>
                            <div class="social-container">
                                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="social"><i class="fa fa-google"></i></a>
                                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="form-group">
                                <input class="input-login-sign-up" type="text" name="fname" placeholder="First Name">
                            </div>
                            
                            <div class="form-group">
                                <input class="input-login-sign-up" type="text" name="lname" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <input class="input-login-sign-up" type="text" name="no_hp" placeholder="No Hp">
                            </div>
                            <div class="form-group">
                                <input type="email" class="input-login-sign-up" name="email" placeholder="Email">
                                <span>or use your email for registration</span>
                            </div>
                            <div class="form-group">
                                <select name="provinsi" id="prov" class="form-control">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="kota" id="city" class="form-control">
                                    <option value="" disabled selected>Pilih Kota</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" class="input-login-sign-up" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kode_pos" class="input-login-sign-up" placeholder="Kode Pos">
                            </div>
                            <div class="form-group">
                                <input type="text" class="input-login-sign-up" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="input-login-sign-up" name="password" placeholder="Password">    
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox"  class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree to terms & conditions</label>
                                <!-- <input type="checkbox" class="cek" id="icek"><span class="spancek">I agree to terms & conditions</span> -->
                            </div>
                         
                            <button type="submit" class="btn btn-sign " name="regis" id="reg" onclick="cek();">Sign Up</button>
                            <!-- <input type="submit" name="regis" value="Sign Up" id="reg" onclick="cek();" disabled> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container" id="container">
        <div class="form-container sign-up-container">
                <form action="#" method="POST">
                    @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname" placeholder="Last Name">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="alamat" placeholder="Alamat">
                <input type="text" name="user" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="checkbox" class="cek" id="icek"><span class="spancek">I agree to terms & conditions</span>
                <button type="submit" name="regis" id="reg" onclick="cek();">Sign Up</button>
                <input type="submit" name="regis" value="Sign Up" id="reg" onclick="cek();" disabled>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <h1>Sign In</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Forgot Your Password</a>
                <button>Sign In</button>
            </form>
        </div>

        <div class="overlay-container 	d-none d-sm-block">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang!</h1>
                    <p>Silahkan daftar bersama kami dan kenali serta lestarikan budaya Indonesia dengan Produk dari TSTL-<a style="color: red;">C</a>oolture.ID </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Haii, Gaiss!</h1>
                    <p>Silahkan masuk dan nikmati produk dari TSTL-<a style="color: red;">C</a>oolture.ID  </p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div> -->

   <!-- @include('templates.partials._footer') -->

@endsection

@push('scripts')
@include('templates.partials._scriptsuser')

<script type="text/javascript">
		function cek(){
            var vcek = document.getElementById('icek');
            var sub = document.getElementById('reg');
            
            if (vcek.checked == true) {
                document.getElementById('reg').disabled = false;
                
            }
        }
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


    // var prov = $(this).val();
    // console.log(prov);

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

    const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
	</script>

@endpush