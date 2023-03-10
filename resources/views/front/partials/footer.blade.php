<footer class="bg-dark">
    <div class="container">
        <div class="row align-items-center pt-8 pb-4">
        </div>

        <div class="border-bottom border-white-10">
            <div class="row py-6">
                <div class="col-md-6 col-12  mb-7 mb-lg-0">
                    <span class="text-cap text-white">Contact information</span>

                    <!-- List -->
                    <ul class="list-unstyled list-py-1 mb-0 d-flex flex-column">
                        <a href="https://maps.google.com/?q={{$settings->lat}},{{$settings->lng}}" target="_blank">
                            <li class="link link-light link-light-75 text-decoration-underline"  href="#"><i class="bi-pin"> </i>{{ $settings->address }}</li>
                        </a>
                        @if($settings->email)
                        <li class="link link-light link-light-75" href="#"><i class="bi-chat-left-text"> </i> {{ $settings->email }}</li>
                        @endif

                        @if($settings->phone)
                        <li class="link link-light link-light-75" href="#"><i class="bi-phone"> </i>{{ $settings->phone }}</li>
                        @endif

                        @if($settings->mobilephone)
                        <li class="link link-light link-light-75" href="#"><i class="bi-phone"> </i>{{ $settings->mobilephone }}</li>
                        @endif
                    </ul>
                    <!-- End List -->
                </div>
                <div class="col-md-6 col-12">
                    @if($settings->facebook || $settings->instagram)

                    <span class="text-cap text-white">Follow us</span>
                    @endif
                    <!-- List -->
                    <ul class="list-unstyled list-py-2 mb-0">

                        @if($settings->facebook)
                        <li><a class="link link-light link-light-75" href="{{$settings->facebook}}" target="_blank">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi-facebook"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-2">
                                            <span>Facebook</span>
                                    </div>
                                </div>
                            </a></li>
                        @endif
                        @if($settings->instagram)
                        <li><a class="link link-light link-light-75" href="{{$settings->instagram}}" target="_blank">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi-instagram"></i>
                                    </div>

                                    <div class="flex-grow-1 ms-2">
                                            <span>Instagram</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif
                    </ul>
                        <!-- End List -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        <div class="row align-items-md-center py-6">
            <div class="col-md mb-3 mb-md-0">
                <div class="col-md-auto text-rig">
                    <p class="fs-5 text-white-70 mb-0"> © {{$settings->title}} {{\Carbon\Carbon::now()->year}}</p>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
</footer>
