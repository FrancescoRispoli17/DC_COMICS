<header>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div class="col-auto">
                  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ Vite::asset('resources/img/DC_Comics_logo.svg.png') }}" alt="DC logo" width="80px"></a>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="col collapse navbar-collapse fw-bold" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item mt-2 ms-1 mt-md-0">
                        <a href="#" class="listLink">CHARACTERS</a>
                    </li>
                    <li class="nav-item mt-2 ms-1 mt-md-0">
                        <a href="{{route('comics.index')}}" class="listLink @yield('active')">COMICS</a>
                    </li>
                    <li class="nav-item mt-2 ms-1 mt-md-0">
                        <a href="#" class="listLink">MOVIES</a>
                    </li>
                    <li class="nav-item mt-2 ms-1 mt-md-0">
                        <a href="#" class="listLink">TV</a>
                    </li>
                    <li class="nav-item mt-2 ms-1 mt-md-0">
                        <a href="#" class="listLink">GAMES</a>
                    </li>
                </ul>
                <hr>
                  @guest
                  <div class="d-flex">
                      <div class="me-md-3 auth login">
                          <a class="text-danger" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                      </div>
                      @if (Route::has('register'))
                          <div class="auth register">
                              <a class="text-danger" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                          </div>
                      @endif
                  </div>
                    @else
                        <div class="nav-item dropdown ms-auto">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ strtoupper(Auth::user()->name) }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item fw-bold" href="{{ route('admin.dashboard') }}">{{ __('PROFILO') }}</a>
                                <a class="dropdown-item fw-bold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('ESCI') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
              </div>
            </div>
          </nav>
    
</header>