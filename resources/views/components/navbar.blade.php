<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="navbar">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ Storage::url('logo-bianco-orr.png') }}" width="100" class="img-fluid" alt="logo" id="navbarLogo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link font-uno" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <div class="dropdown">
                <button class="btn dropdown-toggle btn-transparent font-uno text-white border-0 pt-2" type="button"
                    id="category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('ui.categorie') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="category">
                    @switch(App::getLocale())
                        @case('it')
                            @foreach ($categories as $category)
                                <a class="dropdown-item font-uno"
                                    href="{{ route('public.announcements.category', [$category->name_it, $category->id]) }}">{{ $category->name_it }}</a>
                            @endforeach
                        @break
                        @case('en')
                            @foreach ($categories as $category)
                                <a class="dropdown-item font-uno"
                                    href="{{ route('public.announcements.category', [$category->name_en, $category->id]) }}">{{ $category->name_en }}</a>
                            @endforeach
                        @break
                        @default

                    @endswitch


                </div>
            </div>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto font-uno">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif

            @else



                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                            href="{{ route('announcements.create') }}">{{ __('ui.Pannello di controllo') }}</a>
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
            <li class="nav-item">
                <x-locale lang="it" nation="it" />
            </li>
            <li class="nav-item">
                <x-locale lang="en" nation="gb" />
            </li>
        </ul>
    </div>


</nav>
