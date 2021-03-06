<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: #fff !important">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}">
                        Home
                    </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/shop') }}">
                        Shop
                    </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/contact') }}">
                        Contacts
                    </a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                @if (Auth::user()->image != null)
                <li class="nav-item ">
                    <img class="img-fluid img-thumbnai" src="{{ url('storage/', Auth::user()->image) }}"
                        alt="Profile image" style="width: 50px">
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item mt-1" href="{{ route('profiles.edit',Auth::user()->id ) }}"> Manage
                            Accounts
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @if (Auth::user()->role_id == 1)
                <li class="nav-item ml-4">
                    <a class="nav-link text-white bg-dark" href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>