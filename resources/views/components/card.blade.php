<div class="col-12 col-md-6 bg-dark rounded-left pt-5 pl-5 pr-0 my-5">
    {{-- <a href="{{ route('announcements.show', compact('announcement')) }}" class="text-decoration-none"> --}}
        <h2 class="text-white">{{ $title }}</h2>
    {{-- </a> --}}
    <h6 class="text-uppercase my-3"> <span
            class="bg-yellow py-2 px-2 rounded-bottom pt-0 "><a>{{ $category }}</a></span>
    </h6>
    <p class="text-white mt-4"><i class="fas fa-user text-white"></i> {{ $name }} <i class="fal fa-clock ml-2"></i>
        {{ $createdAt }}
    </p>
    <p class="text-white pr-5 text-justify">{!! $body !!}</p>
    <h5 class="text-uppercase my-5 text-right h4"> <span class="bg-white p-3 rounded-left">
            €{{ $price }}</span>
    </h5>

</div>
<div class="col-12 col-md-6 pl-0 my-5">
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @dd(Announcement::find($id))
            @foreach ($announcement->images->get() as $image)
                <div class="swiper-slide">
                    <img class="img-fluid img-product" src="{{ $image->getUrl(600, 600) }}" alt="">
                </div>
            @endforeach

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
