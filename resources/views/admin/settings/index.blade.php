@extends('layouts.app')
@section('content')
    <div class="page-body w-100 h-100 mx-5">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @if(count($settings) <= 0)
                    <a href="{{route('settings.create')}}" class="btn btn-round btn-info"><i class="material-icons">add_circle</i>New
                        Settings</a>
                @else
                    @foreach($settings as $setting)
                        <p><a class="btn btn-round shiny btn-warning" href="/admin/settings/{{ $setting->id }}/edit"> <i
                                    class="material-icons">edit</i>Edit Settings </a></p>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Main URL</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->mainurl != NULL)
                                    {{ $setting->mainurl }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Title</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->title != NULL)
                                    {{ $setting->title }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">E-mail</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->email != NULL)
                                    {{ $setting->email }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Address</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->address != NULL)
                                    {{ $setting->address }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Logo</label>
                    </div>
                    <div class="row">
                        <div class="container">
                            @foreach($settings as $setting)
                                <img src="/assets/img/logo/originals/{{ $setting->logo }}" class="margin-left-10 margin-top-10 img-fluid"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Profile picture</label>
                    </div>
                    <div class="row">
                        <div class="container">
                            @foreach($settings as $setting)
                                <img src="/assets/img/profile_picture/originals/{{ $setting->profile_picture }}" class="margin-left-10 margin-top-10 img-fluid"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Description</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->description != NULL)
                                    {!! $setting->description !!}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Short description</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->seo_desc != NULL)
                                    {{ $setting->seo_desc }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Mobile phone</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->mobilephone != NULL)
                                    {{ $setting->mobilephone }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Phone</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->phone != NULL)
                                    {{ $setting->phone }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Facebook</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->facebook != NULL)
                                    {{ $setting->facebook }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">Instagram</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->instagram != NULL)
                                    {{ $setting->instagram }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">LAT</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->lat != NULL)
                                    {{ $setting->lat }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group bmd-form-group card">
                    <div class="card-body">
                        <label class="bmd-label">LNG</label>
                    </div>
                    <div class="row">
                        <div class="card-body margin-left-10">
                            @foreach($settings as $setting)
                                @if($setting->lng != NULL)
                                    {{ $setting->lng }}
                                @else
                                    n/a
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group bmd-form-group card">
                <div class="card-body">
                    <label class="bmd-label">Last changes</label>
                </div>
                <div class="row">
                    <div class="card-body margin-left-10">
                        @foreach($settings as $setting)
                            {{ $setting->updated_at->diffForHumans() }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function initMap() {
            $.HSCore.components.HSGMap.init('.js-g-map');
        }

        $(document).on('ready', function () {
            // initialization of carousel
            $.HSCore.components.HSCarousel.init('.js-carousel');

            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

            // initialization of go to section
            $.HSCore.components.HSGoTo.init('.js-go-to');

            $('#processes [role="tablist"] .nav-link').on('click', function () {
                setTimeout(function () {
                    $('#processesTabs .js-carousel').slick('setPosition');
                }, 200);
            });
        });
        $(window).on('load', function () {
            // initialization of HSScrollNav
            $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
                duration: 700
            });
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });
    </script>
    <!-- Google Maps -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8VZx7pTEJk6GqS4v93d-a9kSgeduiIu4&callback=initMap"></script>
@endsection
