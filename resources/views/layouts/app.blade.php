<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- TODO add GOOGLE_ANALYTICS_TRACKING_ID to config rather than env --}}
    @production
        @empty(env('GOOGLE_ANALYTICS_TRACKING_ID'))
        @else
            {{-- Global site tag (gtag.js) - Google Analytics --}}
            <script async
                    src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_TRACKING_ID', 'undefined') }}">
            </script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());
                gtag('config', '{{ env('GOOGLE_ANALYTICS_TRACKING_ID', 'undefined') }}');
            </script>
        @endempty
    @endproduction
    {{-- metadata --}}
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @env(['local', 'staging'])
        <meta name="robots" content="none"/>
    @endenv

    {{-- Primary Meta Tags --}}
    <title>@if (View::hasSection('title'))
            @yield('title')
        @else
            {{ config('app.name', 'Digitized Medieval Manuscripts app - DMMapp') }}
        @endif</title>
    <meta name="title"
          content="@if (View::hasSection('title-meta'))@yield('title-meta')@else{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}@endif">
    <meta name="description"
          content="@if (View::hasSection('description-meta'))@yield('description-meta')@else{{ 'Find digitized medieval manuscripts, illuminated books, IIIF repositories, and much more!' }}@endif">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title"
          content="@if (View::hasSection('title-meta'))@yield('title-meta')@else{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}@endif">
    <meta property="og:description"
          content="@if (View::hasSection('description-meta'))@yield('description-meta')@else{{ 'Find digitized medieval manuscripts, illuminated books, IIIF repositories, and much more!' }}@endif">
    <meta property="og:image" content="{{ asset('/img/dmmapp.png') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title"
          content="@if (View::hasSection('title-meta'))@yield('title-meta')@else{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}@endif">
    <meta property="twitter:description"
          content="@if (View::hasSection('description-meta'))@yield('description-meta')@else{{ 'Find digitized medieval manuscripts, illuminated books, IIIF repositories, and much more!' }}@endif">
    <meta property="twitter:image" content="{{ asset('/img/dmmapp.png') }}">

    {{-- Icons --}}
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="canonical" href={{ URL::current() }}>

    {{-- Vendor CSS Files --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css')

</head>

<body>

{{-- SECTION -  Header --}}
<header id="header" class="d-flex align-items-center shadow-sm">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h2><a href="{{ url('/') }}">DMMapp</a></h2>
            {{-- TODO image logo --}}
            {{-- <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="DMMapp Logo"
                    class="img-fluid"></a> --}}
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link" href="/">Home</a></li>
                @if (Request::is('/'))
                    <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link" href="#tools">Tools</a></li>
                            <li><a class="nav-link" href="#team">Team</a></li>
                            <li><a class="nav-link" href="#cta">Support Us</a></li>
                        </ul>
                @else
                    <li><a class="nav-link" href="#cta">Support Us</a></li>
                @endif
                <li><a class="nav-link" href="{{ route('map') }}">Map</a></li>
                <li><a class="nav-link" href="{{ route('data') }}">Data</a></li>
                <li><a class="nav-link" href="https://blog.digitizedmedievalmanuscripts.org/" target="_blank">Blog <sup><i
                                class="bi bi-box-arrow-up-right small"></i></sup></a></li>
                <li><a class="nav-link"
                       href="https://blog.digitizedmedievalmanuscripts.org/contact-us/" target="_blank">Contact <sup><i
                                class="bi bi-box-arrow-up-right small"></i></sup></a></li>
                @auth
                    <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link" href="{{ route('create_library') }}">Create institution</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('admin') }}">List institutions</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('broken-links') }}">Broken links</a>
                            </li>
                            <li><a class="nav-link" href="/admin/jobs/" target="_blank" rel="noopener noreferrer">Jobs
                                    Monitor</a>
                            </li>
                            <hr>
                            <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                <li class="ml-4"></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle mx-3"></i>
        </nav>{{-- .navbar --}}

        <div class="header-social-links d-flex align-items-center">
            <a href="https://www.patreon.com/join/424150" class="patreon" data-dmmapp="patreon-top-icon"><i
                    class="bi bi-chat-left-heart-fill"></i></a>
            <a href="https://www.linkedin.com/company/sexy-codicology" class="linkedin"><i
                    class="bi bi-linkedin"></i></a>

        </div>

    </div>
</header>
{{-- !SECTION Header --}}

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs border-bottom shadow">
        <div class="container">

            @yield('breadcrumbs')

        </div>
    </section>
    <section class="inner-page">
        <div class="container border py-4 shadow rounded">

            @yield('content')
        </div>
    </section>

</main>{{-- !SECTION #main --}}

{{-- SECTION -  Footer --}}
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>DMMapp</h3>
                        <div class="social-links mt-3">
                            <a href="https://www.patreon.com/join/424150" class="patreon"
                               data-dmmapp="patreon-footer-icon"><i
                                    class="bi bi-chat-left-heart-fill"></i></a>
                            <a href="https://www.linkedin.com/company/sexy-codicology" class="linkedin"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a
                                href="https://blog.digitizedmedievalmanuscripts.org/about/">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a
                                href="https://blog.digitizedmedievalmanuscripts.org">Blog</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('map') }}">Map</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('data') }}">Data</a></li>
                        <li><i class="bx bx-chevron-right disabled"></i> <a href="#">API (coming soon)</a></li>

                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-patreon">
                    <h4>Support us</h4>
                    <p>The DMMapp lives on donations by manuscripts lovers like yourself!</p>
                    <a href="https://www.patreon.com/join/424150"
                       data-patreon-widget-type="become-patron-button" data-dmmapp="patreon-footer-link">Become a
                        Patron!</a>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Sexy Codicology</span></strong>. <a rel="license"
                                                                               href="https://creativecommons.org/licenses/by/4.0/"><img
                    alt="Creative Commons License"
                    style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png"/></a><br/>This
            work is licensed under a <a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative
                Commons Attribution 4.0 International License</a>.
            <p>Made in The Netherlands</p>
            @guest
                <div>
                    <a class="fw-lighter text-center" data-dmmapp="login"
                       href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            @endguest
        </div>
        {{-- <div class="credits">
             All the links in the footer should remain intact.
             You can delete the links only if you purchased the pro version.
             Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/DMMapp-bootstrap-metro-style-template/
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> --}}
    </div>
</footer>
{{-- !SECTION Footer --}}

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script type="text/javascript" src="{{asset('/js/manifest.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>

@yield('javascript')
@stack('scripts')

</body>

</html>
