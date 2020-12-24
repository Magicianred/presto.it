<!-- Footer -->
<footer class="bg-black">
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="/media/logo/logo-bianco-orr.png" alt="" width="180"
                    class="mb-3">
                <p class="font-italic text-muted">
                    {{ __('ui.Affidatevi al nostro servizio e non sarete delusi!') }}
                </p>
                <ul class="list-inline mt-4">
                    <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i
                                class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i
                                class="fa fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i
                                class="fa fa-vimeo"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">

                <h6 class="text-uppercase font-weight-bold mb-4 text-white">{{ __('ui.categorie') }}</h6>
                <ul class="list-unstyled mb-0 text-capitalize">
                    @switch(App::getLocale())
                        @case('it')
                        @foreach ($categories as $category)
                            <li class="mb-2 text-muted">
                                <a class="text-white"
                                    href="{{ route('public.announcements.category', [$category->name_it, $category->id]) }}">
                                    {{ $category->name_it }}</a>
                            </li>
                        @endforeach
                        @break
                        @case('en')
                        @foreach ($categories as $category)
                            <li class="mb-2 text-muted">
                                <a class="text-white"
                                    href="{{ route('public.announcements.category', [$category->name_en, $category->id]) }}">
                                    {{ $category->name_en }}</a>
                            </li>
                        @endforeach
                        @break
                        @default

                    @endswitch

                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-white">{{ __('ui.azienda') }}</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="#" class="text-muted">Login</a></li>
                    <li class="mb-2"><a href="#" class="text-muted">Register</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-lg-0">
                <h6 class="text-uppercase font-weight-bold mb-4 text-white">Social</h6>
                <a href="#">
                    <p class="text-white"><i class=" mr-2 text-white fab fa-facebook"></i>Facebook</p>
                </a>
                <a href="#">
                    <p class="text-white"><i class=" mr-2 text-white fab fa-instagram"></i>Instagram</p>
                </a>
                <a href="#">
                    <p class="text-white"><i class=" mr-2 text-white fab fa-twitter"></i>Twitter</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Copyrights -->
    <div class="bg-dark  py-4">
        <div class="container text-center">
            <p class="text-muted mb-0 py-2">© 2020 Ciopisupa All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- End -->
