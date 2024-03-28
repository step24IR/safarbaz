<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    {{--            @vite(['resources/css/app.css', 'resources/js/dashboard.js'])--}}


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title' , 'mengene')</title>
    @vite(['resources/js/admin/admin.js', 'resources/scss/admin/admin.scss'])
    <link rel="shortcut icon" href="{{asset('Home/assets/img/icon_m.png')}}"/>
    <style>
        input, select, textarea {
            color: white !important;
        }

        textarea:focus, input:focus {
            color: white !important;
        }

        table td {
            color: white !important;
        }

        /*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
            overflow: hidden;
            background: #000000;
        }

        #preloader:before {
            content: "";
            position: fixed;
            top: calc(50% - 30px);
            left: calc(50% - 30px);
            border: 6px solid #37517e;
            border-top-color: #fff;
            border-bottom-color: #fff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: animate-preloader 1s linear infinite;
        }

        @keyframes animate-preloader {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    @yield('head')
</head>
<body class="rtl">
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sections.sidebar' , ['sectionName' => $sectionName])
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.sections.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success d-flex justify-content-between" id="message">
                        {{session()->get('message')}}
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.sections.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<div id="preloader"></div>

<script type="module">
    let preloader = $('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove()
        });
    }
    $('.btn-close').on('click', function () {
        $('#message').remove()
    })
    setTimeout(function () {
        $('#message').remove();
    }, 10000);

</script>
<!-- End custom js for this page -->
@yield('scripts')
</body>
</html>
