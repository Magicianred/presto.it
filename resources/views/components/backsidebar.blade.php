<div class="col-md-3 col-lg-2 bg-dark  fixed">
    <div class="logo border-bottom p-3">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/media/logo/logo-bianco-orr.png" width="150" class="img-fluid" alt="">
        </a>
    </div>
    <div class="foto-utente d-flex p-3 border-bottom">
        <div class="left">
            <img class="img-fluid rounded-pill" src="/media/img/user.jpg" width="60px" alt="foto-profilo">
            @if (Auth::user()->is_revisor == true && Auth::user()->is_admin == true)
                <h6 class="text-center text-white mt-2">Admin/ <br>Revisore</h6>
            @elseif(Auth::user()->is_admin == true)
                <h6 class="text-center text-white mt-2">Admin</h6>
            @elseif(Auth::user()->is_revisor == true)
                <h6 class="text-center text-white mt-2">Revisore</h6>
            @endif

        </div>
        <div class="pl-3 pt-2">
            <h5 class="font-weight-bold text-white h5">{{ Auth::user()->name }}</h5>
            <h6 class="p-0 m-0 d-block text-white">{{ __('ui.Membro dal') }} {{ Auth::user()->created_at->format('Y') }}
            </h6>
        </div>
    </div>
    <div class="sidebar-menu text-white py-3 border-bottom">
        <div class="pl-2">
            @if (Auth::user()->is_admin == true)
                <p>
                    <i class="fas fa-users fa-2x pb-3 pr-2"></i>
                    <a class="text-white" href="{{ route('admin.index') }}">{{ __('ui.Tutti gli utenti') }}</a>
                </p>
            @endif

            <p>
                <i class="fal fa-edit fa-2x pb-3 pr-2"></i>
                <a class="text-white" href="{{ route('announcements.all') }}">{{ __('ui.Modifica Annuncio') }}</a>
            </p>
            <p>
                <i class="fas fa-plus fa-2x pr-3 pb-3"></i>
                <a class="text-white" href="{{ route('announcements.create') }}">{{ __('ui.Nuovo Annuncio') }}</a>
            </p>
            <p>
                @if (Auth::user()->is_revisor)
                    <p>
                        <i class="fas fa-cogs fa-2x pb-3"></i>
                        <a class="text-white" href="{{ route('revisor.home') }}">
                            {{ __('ui.Revisione Annuncio') }}
                            <span
                                class="badge badge-pill badge-warning">{{ \App\Models\Announcement::ToBeRevisionedCount() }}</span>
                        </a>
                    </p>
                    <p>
                        <i class="far fa-trash-undo-alt fa-2x pb-3"></i>
                        <a class="text-white" href="{{ route('revisor.trash') }}">
                            {{ __('ui.Cestino Annunci') }}
                            <span
                                class="badge badge-pill badge-danger">{{ \App\Models\Announcement::ToBeTrashCount() }}</span>
                        </a>
                    </p>
                @endif

            </p>

        </div>
    </div>
    <div class=" mt-4 pl-2">
        <i class="fal fa-home-alt fa-2x text-white pr-2"></i>
        <a class="text-white" href="{{ route('home') }}">{{ __('ui.Torna alla home') }}</a>
    </div>
    <div class="exit mt-4 pl-2 pb-3 ">
        <i class="fal fa-sign-out fa-2x text-white pr-2"></i>
        <a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">{{ __('ui.Esci') }}</a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
