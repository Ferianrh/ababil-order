<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" ></i>
                </button>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}"><img src="{{asset('assets/images/logo/ABABIL 1.png')}}" width="50px" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{route('admin.dashboard')}}"><img src="{{asset('assets/images/logo/ABABIL 1.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" style="margin-left: -20px;">
                    <li class="active">
                        <a href="{{route('admin.dashboard')}}" class="text-left"> <i class="menu-icon fa fa-dashboard"></i>Ababil-Sublime Printing </a>
                    </li>
                    
                    <h3 class="menu-title text-left" >Edit Akun</h3><!-- /.menu-title -->
                    <li >
                        <a href="tabel-admin.php" class="text-left"> <i class="menu-icon fa fa-laptop"></i>Pegawai</a>
                    </li>
                    <li >
                        <a href="tabel-pelanggan.php" class="text-left"> <i class="menu-icon fa fa-table"></i>Pembeli</a>
                    </li>
                    
                    <h3 class="menu-title text-left" >Data</h3><!-- /.menu-title -->
                    
                    <li>
                        <a href="{{route('katalog.index')}}"  class="text-left"> <i class="menu-icon fa fa-book"></i>Katalog</a>
                    </li>

                    <li>
                        <a href="{{route('jenis-jahit.index')}}"  class="text-left"> <i class="menu-icon fa fa-hashtag"></i>Jenis Jahit</a>
                    </li>

                    <li>
                        <a href="{{route('ukuran.index')}}"  class="text-left"> <i class="menu-icon fa fa-arrows-alt"></i>Ukuran</a>
                    </li>

                    <li>
                        <a href="{{route('sisi-print.index')}}"  class="text-left"> <i class="menu-icon fa fa-cube"></i>Sisi Print</a>
                    </li>

                    <li>
                        <a href="{{route('kain.index')}}"  class="text-left"> <i class="menu-icon fa fa-hashtag"></i>Kain</a>
                    </li>

                    <li>
                        <a href="#"  class="text-left"> <i class="menu-icon fa fa-envelope"></i>Pemesanan</a>
                    </li>
                    <li>
                        <a href="#" class="text-left"> <i class="menu-icon fa fa-tasks"></i>Barang</a>
                    </li>
                    

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->