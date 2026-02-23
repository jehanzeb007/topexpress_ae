<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css2?family={{ urlencode(theme_option('font_heading', 'Jost')) }}:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Muli')) }}:300,400,600,700" rel="stylesheet" type="text/css">
    <!-- CSS Library-->

    <style>
        :root {
            --primary-color: {{ theme_option('primary_color', '#2b4db9') }};
            --font-body: {{ theme_option('primary_font', 'Muli') }}, sans-serif;
            --font-heading: {{ theme_option('font_heading', 'Jost') }}, sans-serif;
        }
    </style>

    <script>
        "use strict";
        window.trans = {
            "Price": "{{ __('Price') }}",
            "Number of rooms": "{{ __('Number of rooms') }}",
            "Number of rest rooms": "{{ __('Number of rest rooms') }}",
            "Square": "{{ __('Square') }}",
            "No property found": "{{ __('No property found') }}",
            "million": "{{ __('million') }}",
            "billion": "{{ __('billion') }}",
            "in": "{{ __('in') }}",
            "Added to wishlist successfully!": "{{ __('Added to wishlist successfully!') }}",
            "Removed from wishlist successfully!": "{{ __('Removed from wishlist successfully!') }}",
            "I care about this property!!!": "{{ __('I care about this property!!!') }}",
            "See More Reviews": "{{ __('See More Reviews') }}",
            "Reviews": "{{ __('Reviews') }}",
            "out of 5.0": "{{ __('out of 5.0') }}",
            "service": "{{ trans('review.service') }}",
            "value": "{{ trans('review.value') }}",
            "location": "{{ trans('review.location') }}",
            "cleanliness": "{{ trans('review.cleanliness') }}",
            "please_enter_address": "{{ __('Please enter address') }}",
            "address_invalid": "{{ __('Address invalid') }}"
        }
        window.themeUrl = '{{ Theme::asset()->url('') }}';
        window.siteUrl = '{{ url('') }}';
        window.currentLanguage = '{{ App::getLocale() }}';
    </script>

    {!! Theme::header() !!}
</head>
<body class="{{ theme_option('skin', 'blue') }}" @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
<div id="alert-container"></div>

@if (theme_option('preloader_enabled', 'no') == 'yes')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
@endif

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->

    <div class="topbar bg-brand p-2 d-none">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                @if (is_plugin_active('language'))
                    <div class="currency-wrapper">
                        {!! $languages = apply_filters('language_switcher') !!}
                    </div>
                @endif

                @if (is_plugin_active('real-estate'))
                    <div class="topbar-right d-flex align-items-center">
                        <div class="topbar-wishlist">
                            <a class="text-white" href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                        </div>
                        @php $currencies = get_all_currencies(); @endphp
                        @if (count($currencies) > 1)
                        <div class="ms-3 text-white currency-wrapper">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ get_application_currency()->title }}
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach ($currencies as $currency)
                                        <li>
                                            <a class="dropdown-item"  href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light head-shadow">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    @if (theme_option('logo'))
                        <a class="nav-brand" href="{{ route('public.index') }}"><img class="logo" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ setting('site_title') }}"></a>
                    @endif
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    {!! Menu::renderMenuLocation('main-menu', [
                        'view'    => 'menu',
                        'options' => ['class' => 'nav-menu'],
                    ]) !!}

                    @if (is_plugin_active('real-estate') && RealEstateHelper::isRegisterEnabled())
                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li>
                                <a href="https://wa.me/{{ theme_option('hotline') }}" target="_blank" class="p-2">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#00a82d" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                        </svg>
                                    </i>
                                </a>
                            </li>
                            <li class="add-listing">
                                <a href="{{ url('contact') }}" class="">{{ __('GET IN TOUCH') }}</a>
                            </li>


                            {{--                            <li>--}}
{{--                                <a href="{{ route('public.account.properties.create') }}" class="text-success"><img src="{{ Theme::asset()->url('') }}/img/submit.svg" width="20" alt="" class="mr-2" /> {{ __('Add Property') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (auth('account')->check())--}}
{{--                                <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>--}}
{{--                                <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>--}}
{{--                            @else--}}
{{--                                <li class="add-listing">--}}
{{--                                    <a href="{{ route('public.account.login') }}"><img src="{{ Theme::asset()->url('') }}/img/user-light.svg" width="12" alt="" class="mr-2" />{{ __('Sign In') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}



                        </ul>

                        @if (auth('account')->check())
{{--                            <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
                        @endif
                    @endif
                    @if (is_plugin_active('real-estate'))
                        <div class="clearfix"></div>
                        <div class="d-sm-none mobile-menu">
                            <div class="mobile-menu-item mobile-wishlist">
                                <a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                            </div>
                            @if (count($currencies) > 1)
                                <div class="mobile-menu-item currency-wrapper">
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLinkMobile" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ get_application_currency()->title }}
                                            <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLinkMobile">
                                            @foreach ($currencies as $currency)
                                                <li>
                                                    <a class="dropdown-item"  href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if (is_plugin_active('language'))
                                <div class="mobile-menu-item currency-wrapper">
                                    {!! $languages = apply_filters('language_switcher') !!}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>
