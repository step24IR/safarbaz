<!DOCTYPE html>
<html lang="fr" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta_tags')
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

{{--    @vite(['resources/js/home/home.js', 'resources/scss/home/home.scss'])--}}

    <link rel="stylesheet" href="{{asset('HomeAssets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/css/persian-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/css/fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('HomeAssets/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('HomeAssets/fonts/fontawesome/css/font-awesome.min.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('HomeAssets/css/style.css')}}">
    @yield('head')
</head>
<body>
    @include('home.sections.header' , ['isBlog' => $isBlog])
{{--    @if (session()->has('message'))--}}
{{--        <div class="alert alert-success d-flex justify-content-between" id="message">--}}
{{--            {{session()->get('message')}}--}}
{{--            <button type="button" class="btn-close" aria-label="Close"></button>--}}
{{--        </div>--}}
{{--    @endif--}}

    @yield('content')
    @include('home.sections.footer')

    <script src="{{asset('HomeAssets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/popper.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/aos.js')}}"></script>
    <script src="{{asset('HomeAssets/js/select2.min.js')}}"></script>

    <script src="{{asset('HomeAssets/js/persian-date.min.js')}}"></script>
    <script src="{{asset('HomeAssets/js/persian-datepicker.min.js')}}"></script>

    <script src="{{asset('HomeAssets/js/main.js')}}"></script>
    @yield('scripts')
</body>
</html>
