<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand font-abril" href="{{ url('/') }}">
            {{ config('app.name', 'White Cross Medical Clinic') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active px-2">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link js-scroll-trigger" href="#Services"><span class="fas fa-briefcase-medical fa-lg"></span> Services</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link js-scroll-trigger" href="#About"><i class="fas fa-users fa-lg"></i> About</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link js-scroll-trigger" href="#Contact"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
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