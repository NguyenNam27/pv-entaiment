<header class="">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="{{route('trangchu')}}">
                <img src="FE/image/logoo.png" alt="">
            </a>
        </div>
        <i class="fa-solid fa-bars icon-menu"></i>
        <i class="fa-solid fa-xmark icon-close"></i>
        <nav class="menu">
            <ul class="d-flex">
                <li class="menu1">
                    <a href="{{route('KOL')}}">ARTIST</a>
                    <ul class="menu2">
                        <li><a href="{{route('lienhe')}}">booking</a></li>
                    </ul>
                </li>
                <li><a href="{{route('tintuc')}}">news</a></li>
                <li class="menu1">
                    <a href="{{route('picture')}}">gallery</a>
                    <ul class="menu2">
                        <li><a href="{{route('picture')}}">picture</a></li>
                        <li><a href="{{route('video')}}">video</a></li>
                    </ul>
                </li>
                <li><a href="{{route('product')}}">store</a></li>
                <li ><a href="">CONTACT </a></li>

            </ul>
        </nav>
        <div class="login">
                <ul class="d-flex">
                    @guest

                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>

                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
        </div>
    </div>
    <div class="mb-menu">
        <ul>
            <li style="animation-delay: 0s">
                <a href="{{route('KOL')}}">ARTIST</a>
                <ul>
                    <li ><a href="{{route('lienhe')}}">BOOKING</a></li>
                </ul>
            </li>
            <li ><a href="{{route('tintuc')}}">NEWS</a></li>
            <li >
                <a href="{{route('picture')}}">GALLERY</a>
                <ul>
                    <li><a href="{{route('picture')}}">PICTURE</a></li>
                    <li><a href="{{route('video')}}">VIDEO</a></li>
                </ul>
            </li>
            <li style="animation-delay: 0.4s"><a href="{{route('product')}}">STORE</a></li>
            <li ><a href="">CONTACT </a></li>


        @guest

                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        <span class="caret"></span>

                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</header>
