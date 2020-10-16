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
                        
                        @if(Auth::check())
                        <li>
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle text-center pr-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user-circle"></i> {{Auth::user()->username}}
                                </a>

                                <div class="dropdown-menu item-dropdown" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-user-circle mr-3 ml-1"></i>  {{Auth::user()->username}}
                                    </a>
                                    <a class="dropdown-item" href="">
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
                <a><img src="images/menu.png" class="menu-icon" onclick="menutoggle();"></a>
            </div>
            