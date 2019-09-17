<nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand font-abril" href="{{ url('/') }}">
            {{ config('app.name', 'White Cross Medical Clinic') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon">
            </span>
        </button>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-primary" href="#About">About</a>
                    {{-- <i class="fas fa-users fa-lg"></i>  --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-primary" href="#Services">Services</a>
                    {{-- <span class="fas fa-briefcase-medical fa-lg"></span>  --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-primary" href="#Contact">Contact</a>
                    {{-- <i class="fa fa-phone" aria-hidden="true"></i>  --}}
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @auth
                                @if(Auth::user()->role->description == 'ADMIN')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard', ['name' => Auth::user()->username]) }}">Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                @elseif(Auth::user()->role->description == 'PATIENT')
                                    
                                @elseif(Auth::user()->role->description == 'DOCTOR')

                                @elseif(Auth::user()->role->description == 'NURSE')

                                @endif
                            @endauth

                            {{-- @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                <div class="dropdown-divider"></div>
                            @endif --}}
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
</nav>