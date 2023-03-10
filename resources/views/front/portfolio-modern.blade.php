<!DOCTYPE html>
<html lang="mk">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{isset($settings->title) ? $settings->title : 'Unknown'}}">
    <meta itemprop="description" content="{{isset($settings->seo_desc) ? $settings->seo_desc : 'Unknown'}}">
    <meta itemprop="image" content="{{isset($settings->logo) ? asset('assets/img/logo/originals/').$settings->logo : 'Unknown'}}">

    <!-- Open Graph data -->
    <meta property="og:locale" content="mk_MK"/>
    <title> {{isset($settings->title) ? $settings->title : 'Unknown'}}    </title>
    <meta property="og:title" content="{{isset($settings->title) ? $settings->title : 'Unknown'}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{isset($settings->mainurl) ? $settings->mainurl : 'Unknown'}}"/>
    <meta property="og:image" content="{{isset($settings->logo) ? asset('assets/img/gallery/originals/').$settings->logo : 'Unknown'}}"/>
    <meta property="og:description" content="{{isset($settings->seo_desc) ? $settings->seo_desc : 'Unknown'}}"/>
    <meta property="og:site_name" content="{{isset($settings->title) ? $settings->title : 'Unknown'}}"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front/favicon.png')}}">

    <link href="{{asset('css/app.css')}}" rel="stylesheet"/>

</head>

<body>
<!-- ========== HEADER ========== -->
@include('front.partials.main-absolute-top')
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <div class="container-fluid full-screen top-position">
        <div class="row slider-fade1">
            <div class="owl-carousel owl-theme w-100">
                @foreach($sliders as $slider)
                    <div class="item bg-img theme-overlay-dark" data-overlay-dark="5"
                         data-background="{{asset('assets/img/slider_main_img/originals/'.$slider->main_image)}}">
                        <div class="container h-100">
                            <div class="d-table h-100 w-100">
                                <div class="d-table-cell align-middle caption">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <span class="number d-block">{{$slider->title}}</span>
                                            <h3 class="mb-3 h5"> {{$slider->description}} </h3>
                                        </div>
                                        <div class="col-md-4 d-none d-md-block">
                                            <div class="slider-pic text-right">
                                                <img src="{{asset('assets/img/slider_small_img/thumbnails/'.$slider->small_image)}}" alt="Slider image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Card List -->
    <div class="overflow-hidden" id="about">
        <div class="container content-space-2 content-space-lg-3">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 mb-10 mb-md-0">
                    <div class="position-relative">
                        <img class="img-fluid rounded-3" src="{{asset('assets/img/profile_picture/originals/'.$settings->profile_picture)}}" alt="Image Description">

                        <!-- SVG Shape -->
                        <figure class="position-absolute top-0 end-0 d-none d-lg-block mt-3 me-n7" style="width: 4rem;">
                            <img class="img-fluid" src="{{asset('/front/svg/components/pointer-up.svg')}}" alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->

                        <!-- SVG Shape -->
                        <figure class="position-absolute bottom-0 start-0 mb-n8 ms-n8" style="width: 12rem;">
                            <img class="img-fluid" src="{{asset('/front/svg/components/curved-shape.svg')}}" alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-md-6">
                    <div class="mb-5">
                        <p class="">{{$settings->description}}</p>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Card List -->
    <div class="container content-space-t-2 content-space-t-lg-3 overflow-hidden">


        <!-- Heading -->
        <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-sm-7 mb-lg-10" id="paintings">
            <h2>Дел од нашите уметнички слики</h2>
        </div>
        <!-- End Heading -->


        <div class="row row-cols-1 row-cols-sm-2 gx-7">
            @foreach($gallery as $g)
                <div class="col mb-5">
                    <!-- Card -->
                    <div class="card card-ghost card-transition-zoom popup-gallery-painting">
                        <a class="card-transition-zoom-item" href="{{asset('assets/img/gallery/originals/'.$g->image)}}">
                            <img class="card-img" style="max-height: 400px; object-fit: cover;" src="{{asset('assets/img/gallery/thumbnails/'.$g->image)}}" alt="Image Description">
                        </a>

                        {{--                 <span class="badge bg-dark text-white card-pinned-top-end">New addition</span>--}}
                    </div>
                    <div class="card-body">
                        <h4>{{$g->name}} – <span class="fw-medium">{{$g->description}}</span></h4>
                        <p class="card-text">Gallery</p>
                    </div>

                    <!-- End Card -->
                </div>
                <!-- End Col -->
            @endforeach
        </div>
        <!-- End Row -->
        <!-- Card Grid -->
        <!-- Heading -->
        <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-sm-7 mb-lg-10" id="sglass">
            <h2>Дел од нашите витражи</h2>
        </div>
        <!-- End Heading -->


        <div class="row row-cols-1 row-cols-sm-2 gx-7">
            @foreach($glass as $g)
                <div class="col mb-5">
                    <!-- Card -->
                    <div class="card card-ghost card-transition-zoom popup-gallery-glass">
                        <a class="card-transition-zoom-item" href="{{asset('assets/img/glass/originals/'.$g->image)}}">
                            <img class="card-img" style="max-height: 400px; object-fit: cover;" src="{{asset('assets/img/glass/thumbnails/'.$g->image)}}" alt="Image Description">
                        </a>

                        {{--                 <span class="badge bg-dark text-white card-pinned-top-end">New addition</span>--}}
                    </div>
                    <div class="card-body">
                        <h4>{{$g->name}} – <span class="fw-medium">{{$g->description}}</span></h4>
                        <p class="card-text">Stained glass</p>
                    </div>

                    <!-- End Card -->
                </div>
                <!-- End Col -->
            @endforeach
        </div>
        <!-- End Row -->


        <!-- Heading -->
        <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-sm-7 mb-lg-10" id="mosaics">
            <h2>Дел од нашите мозаици</h2>
        </div>
        <!-- End Heading -->


        <div class="row row-cols-1 row-cols-sm-2 gx-7">
            @foreach($mosaics as $g)
                <div class="col mb-5">
                    <!-- Card -->
                    <div class="card card-ghost card-transition-zoom popup-gallery-mosaic">
                        <a class="card-transition-zoom-item" href="{{asset('assets/img/mosaic/originals/'.$g->image)}}">
                            <img class="card-img" style="max-height: 400px; object-fit: cover;" src="{{asset('assets/img/mosaic/thumbnails/'.$g->image)}}" alt="Image Description">
                        </a>

                        {{--                 <span class="badge bg-dark text-white card-pinned-top-end">New addition</span>--}}
                    </div>
                    <div class="card-body">
                        <h4>{{$g->name}} – <span class="fw-medium">{{$g->description}}</span></h4>
                        <p class="card-text">Mosaics</p>
                    </div>

                    <!-- End Card -->
                </div>
                <!-- End Col -->
            @endforeach
        </div>
        <!-- End Row -->


    </div>
    <!-- End Card Grid -->

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
@include('front.partials.footer')
<a class="js-go-to go-to position-fixed" href="javascript:;" style=""
   data-hs-go-to-options='{
     "offsetTop": 700,
     "position": {
       "init": {
         "right": "2rem"
       },
       "show": {
         "bottom": "2rem"
       },
       "hide": {
         "bottom": "-2rem"
       }
     }
   }'>
    <i class="bi-chevron-up"></i>
</a>

<script src="{{ asset('/js/app.js')}}"></script>
<script>

    $(document).on('ready', function () {
        (function () {
            // INITIALIZATION OF MEGA MENU
            // =======================================================
            const megaMenu = new HSMegaMenu('.js-mega-menu', {
                desktop: {
                    position: 'left'
                }
            })
        })()
    });
</script>
</body>
</html>
