<x-back_layout>
    @if ($announcement)
        <div class="container-fluid">
            <div class="row">
                <x-backsidebar />
                <div class="col-md-9 col-lg-10">
                    <div class="row my-3">
                        <div class="col-12 text-center">
                            <h1>Cestino Annunci</h1>
                        </div>
                    </div>
                    @if (session('deleted'))
                        <div class="container my-5 ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        {{ session('deleted') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach ($announcement as $rejected)
                        <div class="row p-3 ">

                            <div class="col-md-8">
                                <h6> {{ __('ui.Annuncio') }} # {{ $rejected->id }}</h6>
                                <h2>{{ $rejected->title }}</h2>
                                @switch(App::getLocale())
                                    @case('it')
                                    <h6 class="text-uppercase my-3"> <span
                                            class="bg-yellow py-2 px-2 rounded-bottom pt-0 "><a class="text-dark"
                                                href="{{ route('public.announcements.category', [$rejected->category->name_it, $rejected->category->id]) }}">{{ $rejected->category->name_it }}</a></span>
                                    </h6>
                                    @break
                                    @case('en')
                                    <h6 class="text-uppercase my-3"> <span
                                            class="bg-yellow py-2 px-2 rounded-bottom pt-0 "><a class="text-dark"
                                                href="{{ route('public.announcements.category', [$rejected->category->name_en, $rejected->category->id]) }}">{{ $rejected->category->name_en }}</a></span>
                                    </h6>
                                    @break
                                    @default
                                @endswitch
                                <p><i class="fal fa-clock"></i>
                                    {{ $rejected->created_at->format('d/m/Y') }}
                                </p>

                                <h5 class="text-uppercase my-5 h4"> <span class="bg-yellow p-3 rounded-right">
                                        €{{ $rejected->price }}</span>
                                </h5>
                                <h5>{{ __('ui.Descrizione') }}</h5>
                                <p class="pr-5 text-justify">{{ $rejected->body }}</p>
                            </div>
                            <div class="col-md-4 bg-gray-light-color p-4 rounded shadow text-white">
                                <h2>Informazioni dell'utente</h2>
                                <div class="row">
                                    <div class="col-md-6">

                                        <p class="mt-4"><i class="fas fa-user"></i> {{ $rejected->user->name }} </p>
                                        <p class="mt-4"><i class="fas fa-user"></i> {{ $rejected->user->email }} </p>
                                        <p class="mt-4"><i class="fas fa-user"></i>
                                            {{ $rejected->user->created_at->format('d/m/Y - H:i:s') }} </p>

                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-fluid rounded-pill" src="{{ Storage::url('img/user.jpg') }}"
                                            width="90%" alt="foto-profilo">

                                    </div>
                                </div>

                            </div>
                        </div>

                        @foreach ($rejected->images as $image)

                            <div class="row mt-4 bg-dark p-5 rounded text-white mx-4">
                                <div class="col-12 col-md-4">
                                    <img class="img-fluid" src="{{ $image->getUrl(550, 500) }}" alt="">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h6 class="h4">{{ __('ui.Analisi') }}</h6>
                                        </div>
                                    </div>
                                    Adult: {{ $image->adult }}%
                                    <x-progress imageValue="{{ $image->adult }}" /><br>
                                    Spoof: {{ $image->spoof }}%
                                    <x-progress imageValue="{{ $image->spoof }}" /><br>
                                    Medical: {{ $image->medical }}%
                                    <x-progress imageValue="{{ $image->medical }}" /><br>
                                    Violence: {{ $image->violence }}%
                                    <x-progress imageValue="{{ $image->violence }}" /><br>
                                    Racy: {{ $image->racy }}%
                                    <x-progress imageValue="{{ $image->racy }}" /><br>

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h6 class="h4">Labels</h6>
                                        </div>
                                    </div>
                                    <div class="row text-center text-dark align-items-center">
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                <div class="col-12 col-md-2 bg-yellow my-2 mx-2 rounded">{{ $label }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="row text-center my-4">
                            <div class="col-12 col-md-7 mb-3">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal">{{ __('ui.Elimina') }}</button>
                            </div>
                            <div class="col-12 col-md-5">
                                
                                <form action="{{ route('revisor.redo', $rejected->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">{{ __('ui.Ripristina') }}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{ __('ui.Vuoi eliminare definitivamente') }}?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">{{ __('ui.No') }}</button>
                        @foreach ($announcement as $rejected)
                        <form action="{{ route('revisor.destroy', $rejected->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('ui.Si') }}</button>
                        </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row align-items-center">
                <x-backsidebar />
                <div class="col-md-9 col-lg-10">
                    <h3 class="text-center">{{ __('ui.Non ci sono annunci da revisionare') }}</h3>
                </div>
            </div>
        </div>

    @endif
</x-back_layout>
