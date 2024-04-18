<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('HomeAssets/fonts/fontawesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('HomeAssets/auth/css/style.css')}}">
    @yield('head')
</head>
<body class="img js-fullheight" style="background-image: url({{asset('HomeAssets/auth/images/bg.jpg')}});">
<section class="ftco-section">
    <div class="container">
        @yield('content')
    </div>
</section>

<script src="{{asset('HomeAssets/auth/js/jquery.min.js')}}"></script>
<script src="{{asset('HomeAssets/auth/js/popper.js')}}"></script>
<script src="{{asset('HomeAssets/auth/js/bootstrap.min.js')}}"></script>
<script src="{{asset('HomeAssets/auth/js/main.js')}}"></script>
@yield('scripts')
</body>
</html>
