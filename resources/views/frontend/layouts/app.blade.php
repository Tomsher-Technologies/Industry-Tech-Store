<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! SEO::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">
    {{-- <meta name="robots" content="index, follow"> --}}

    @yield('meta')

    @if (!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif

    <!-- Favicon -->
    <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">

    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet"> --}}

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    {{-- <link rel="stylesheet" href="{{ frontendAsset('fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}"> --}}
    <link rel="stylesheet" href="{{ frontendAsset('css/bulk-style.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/owl-carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/lightGallery-master/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ frontendAsset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    {{-- <link rel="stylesheet" href="{{ frontendAsset('plugins/select2/dist/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ frontendAsset('css/style.css') }}">
 

@if (get_setting('google_analytics') == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ env('TRACKING_ID') }}');
    </script>
@endif

@if (get_setting('facebook_pixel') == 1)
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code --> @endif

    {{ get_setting('header_script') }}

<script src="{{ frontendAsset('plugins/jquery.min.js') }}"></script>

@yield('header')

</head>
<body>
    <!-- aiz-main-wrapper -->

      {{-- @include('frontend.inc.header') --}}

        @yield('content')

        @include('frontend.inc.footer')

        @yield('modal')

        <!-- SCRIPTS -->
        <script src="{{ frontendAsset('plugins/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/popper.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/masonry.pkgd.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/isotope.pkgd.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/jquery.matchHeight-min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/slick/slick/slick.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/slick-animation.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
        <script src="{{ frontendAsset('plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
        {{-- <script src="{{ frontendAsset('plugins/select2/dist/js/select2.full.min.js') }}"></script> --}}
        {{-- <script src="{{ frontendAsset('plugins/gmap3.min.js') }}"></script> --}}
        <script src="{{ frontendAsset('js/main.js') }}"></script>

        @yield('script')

        {{ get_setting('footer_script') }}

        </body>

</html>
