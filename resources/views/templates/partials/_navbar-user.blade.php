<div class="navbar">
                <div class="logo">
                    <img src="{{asset('assets/images/logo/ABABIL 1.png')}}" width="125px"  alt="logo"/>
                </div>
                <nav>
                    <ul id="menuitems">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Account</a></li>
                        @if(Auth::check())
                        <li><p>Hi, {{Auth::user()->username}}</p></li>
                        <li>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off mr-1 ml-1"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </nav>
                <a><img src="images/menu.png" class="menu-icon" onclick="menutoggle();"></a>
            </div>
            