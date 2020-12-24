<x-layout>
    <div class="container my-5">
       
            <div class="row">
                <h1>{{__('ui.Risultati di ricerca per')}} : {{ $q }}</h1>
            </div>
            <div class="row">
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-6 bg-dark rounded-left pt-5 pl-5 pr-0 my-5">
                    <a href="{{ route('announcements.show', compact('announcement')) }}" class="text-decoration-none">
                        <h2 class="text-white">{{ $announcement->title }}</h2>
                    </a>
                    <h6 class="text-uppercase my-3"> <span class="bg-yellow py-2 px-2 rounded-bottom pt-0 "><a
                                class="text-dark"
                                href="{{ route('public.announcements.category', [$announcement->category->name, $announcement->category->id]) }}">{{ $announcement->category->name }}</a></span>
                    </h6>
                    <p class="text-white mt-4"><i class="fas fa-user text-white"></i> {{ $announcement->user->name }} <i
                            class="fal fa-clock ml-2"></i>
                        {{ $announcement->created_at->format('d/m/Y') }}
                    </p>
                    <p class="text-white pr-5 text-justify">{{ $announcement->body }}</p>
                    <h5 class="text-uppercase my-5 text-right h4"> <span class="bg-white p-3 rounded-left">
                            €{{ $announcement->price }}</span>
                    </h5>

                </div>

                <div class="col-12 col-md-6 pl-0 my-5">

                    <!-- Swiper -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper ">
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide">
                                    <img class="img-home" src="{{ $image->getUrl(550, 500) }}" alt="">
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
