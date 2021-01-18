<x-layout>
<x-slot name="title">Home</x-slot>
    @if (session('message'))
        <div class="container my-5 ">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        </div>

    @endif
    <header class="text-white text-center">
        <div class="bg-first">
        </div>
        <div class="container mt-5 pt-5" style="z-index: 9999">
            <div class="row mt-5">
                <div  class="col-xl-9 mx-auto">
                    <img src="/media/logo/logo-bianco-orr.png" width="500" class="img-fluid my-5" alt="logo-presto">
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto" >
                    <form action="{{ route('search') }}" method="GET" class="mb-5">

                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input type="text" name="q" class="form-control form-control-lg"
                                    placeholder="{{ __('ui.Cerca tra i nostri annunci') }}">
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit"
                                    class="btn btn-block btn-lg btn-primary font-due">{{ __('ui.trova') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
   

    <div class="container margin-top-100 mb-5">
        <div class="row justify-content-center">
            <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" class="col-12 col-md-3 border shadow text-center py-5 mx-5 bg-white">
                <i class="far fa-hands-heart fa-4x"></i>
                <h4 class="pt-4">{{ __('ui.Connessi e sicuri') }}</h4>
            </div>
            <div data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000" class="col-12 col-md-3 border shadow text-center mx-5 py-5 bg-white">
                <i class="fad fa-leaf fa-4x"></i>
                <h4 class="pt-4">{{__('ui.Rapidi e Sostenibili')}}</h4>
            </div>
        </div>
    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-12 text-center">
                <h3>{{ __('ui.Gli ultimi annunci') }}</h3>
            </div>
        </div>
        <div  class="row">
            {{-- @foreach ($announcements as $announcement)
                <x-card id="{{ $announcement->id }}" title="{{ $announcement->title }}"
                    body="{!!  $announcement->body !!}" price="{{ $announcement->price }}"
                    createdAt="{{ $announcement->created_at->format('d/m/Y') }}"
                    category="{{ $announcement->category->title }}" categoryId="{{ $announcement->category->id }}"
                    name="{{ $announcement->user->name }}" />
            @endforeach --}}
            @foreach ($announcements as $announcement)
                <div data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000" class="col-12 col-md-6 bg-dark rounded-left pt-5 pl-5 pr-0 my-md-5 no-animazione">
                    <a href="{{ route('announcements.show', compact('announcement')) }}" class="text-decoration-none">
                        <h2 class="text-white">{{ $announcement->title }}</h2>
                    </a>
                    @switch(App::getLocale())
                        @case('it')
                            <h6 class="text-uppercase my-3">
                                <span class="bg-yellow py-2 px-2 rounded-bottom pt-0 ">
                                    <a class="text-dark"
                                        href="{{ route('public.announcements.category', [$announcement->category->name_it, $announcement->category->id]) }}">
                                        {{ $announcement->category->name_it }}
                                    </a>
                                </span>
                            </h6>
                        @break
                        @case('en')
                            <h6 class="text-uppercase my-3">
                                <span class="bg-yellow py-2 px-2 rounded-bottom pt-0 ">
                                    <a class="text-dark"
                                        href="{{ route('public.announcements.category', [$announcement->category->name_en, $announcement->category->id]) }}">
                                        {{ $announcement->category->name_en }}
                                    </a>
                                </span>
                            </h6>
                        @break
                        @default

                    @endswitch
                    <p class="text-white mt-4"><i class="fas fa-user text-white"></i> {{ $announcement->user->name }} <i
                            class="fal fa-clock ml-2"></i>
                        {{ $announcement->created_at->format('d/m/Y') }}
                    </p>
                    <p class="text-white pr-5 text-justify">{{ $announcement->body }}</p>
                    <h5 class="text-uppercase my-5 text-right h4"> <span class="bg-white p-3 rounded-left">
                            €{{ $announcement->price }}</span>
                    </h5>

                </div>

                <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="2000" class="col-12 col-md-6 pl-0 my-md-5 no-animazione">

                    <!-- Swiper -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper ">
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide">
                                    <img class="img-home img-fluid" src="{{ $image->getUrl(550, 500) }}" alt="">
                                </div>
                            @endforeach

                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
