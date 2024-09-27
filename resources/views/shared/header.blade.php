<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3 py-4">
                <a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/img/DC_Comics_logo.svg.png') }}" alt="DC logo" width="80px"></a>
            </div>
            <div class="col-9 fw-bold text-end">
                <ul class="m-0">
                    <li><a href="#" class="listLink">CHARACTERS</a></li>
                    <li><a href="{{route('admin.comics.index')}}" class="listLink @yield('active')">COMICS</a></li>
                    <li><a href="#" class="listLink">MOVIES</a></li>
                    <li><a href="#" class="listLink ">TV</a></li>
                    <li><a href="#" class="listLink">GAMES</a></li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="ms-3 me-1">
                            <a class="text-danger" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="mx-1">
                                <a class="text-danger" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ strtoupper(Auth::user()->name) }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>