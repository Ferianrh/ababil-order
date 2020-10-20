<div class="navbar">
    <div class="logo">
        <img src="{{asset('assets/images/logo/ABABIL 1.png')}}" width="125px"  alt="logo"/>
    </div>
    <nav>
        <ul id="menuitems">
        @if(Auth::check())
            <li><a href="{{route('home')}}">Home</a></li>
        @else
            <li><a href="/">Home</a></li>
        @endif
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            
            @if(Auth::check())
            <li>
                <div class="dropdown">
                    <div class="btn btn-primary-outline dropdown-toggle text-center pr-3"  data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-user-o"></i> {{Auth::user()->username}}
                    </div>

                    <div class="dropdown-menu item-dropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('setting.index')}}">
                            <i class="fa fa-cog mr-3 ml-1"></i> Profil
                        </a>
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                                <i class="fa fa-power-off mr-3 ml-1"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </div>
            </li>
            @else
            <li><a href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
    </nav>
    <a><img src="{{asset('assets/images/logo/menu.png')}}" class="menu-icon" onclick="menutoggle();"></a>
</div>
@push('scripts')
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@endpush
            