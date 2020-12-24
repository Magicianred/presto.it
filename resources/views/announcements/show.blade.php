<x-layout>
<x-slot name="title">{{$announcement->title}}</x-slot>

    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Swiper -->
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        @foreach ($announcement->images as $image)
                            <div class="swiper-slide">
                                <img class="img-fluid img-product" src="{{ $image->getUrl(550, 500) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        @foreach ($announcement->images as $image)
                            <div class="swiper-slide">
                                <img class="img-fluid img-product" src="{{ $image->getUrl(300, 300) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <h2>{{ $announcement->title }}</h2>

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
                <p class="mt-4"><i class="fas fa-user"></i> {{ $announcement->user->name }} <i
                        class="fal fa-clock ml-2"></i>
                    {{ $announcement->created_at->format('d/m/Y') }}
                </p>
                <h5 class="text-uppercase my-5 h4"> <span class="bg-yellow p-3 rounded-right">
                        €{{ $announcement->price }}</span>
                </h5>
                <h5>{{__('ui.Descrizione')}}</h5>
                <p class="pr-5 text-justify">{{ $announcement->body }}</p>

            </div>
        </div>
    </div>

</x-layout>
