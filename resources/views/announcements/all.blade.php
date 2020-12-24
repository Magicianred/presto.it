<x-back_layout>
    <div class="container-fluid">
        <div class="row">
            <x-backsidebar />
            <div class="col-md-9 col-lg-10">
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <h1>{{ __('ui.Crea il tuo annuncio') }}</h1>
                    </div>
                </div>
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000"
                            class="col-12 col-md-5 bg-dark rounded-left pt-5 pl-5 pr-0 my-md-5">
                            <a href="{{ route('announcements.show', compact('announcement')) }}"
                                class="text-decoration-none">
                                <h2 class="text-white">{{ $announcement->title }}</h2>
                            </a>
                            <h6 class="text-uppercase my-3"> <span class="bg-yellow py-2 px-2 rounded-bottom pt-0 "><a
                                        class="text-dark"
                                        href="{{ route('public.announcements.category', [$announcement->category->name, $announcement->category->id]) }}">{{ $announcement->category->name }}</a></span>
                            </h6>
                            <p class="text-white mt-4"><i class="fas fa-user text-white"></i>
                                {{ $announcement->user->name }} <i class="fal fa-clock ml-2"></i>
                                {{ $announcement->created_at->format('d/m/Y') }}
                            </p>
                            <p class="text-white pr-5 text-justify">{{ $announcement->body }}</p>
                            <h5 class="text-uppercase my-5 text-right h4"> <span class="bg-white p-3 rounded-left">
                                    €{{ $announcement->price }}</span>
                            </h5>
                            <a href="{{route('announcements.edit',compact('announcement'))}}" class="btn btn-primary"><i class="fal fa-edit fa-2x pb-3 pr-2"></i></a>
                           
                        </div>

                        <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="2000"
                            class="col-12 col-md-5 pl-0 my-md-5">

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
        </div>
    </div>
</x-back_layout>
