<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center text-right">
            <div class="col-6 col-lg-4 site-logo " data-aos="fade"><a href="{{route('home.index')}}">سفرباز</a></div>
            <div class="col-6 col-lg-8">
                <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- END menu-toggle -->

                <div class="site-navbar js-site-navbar">
                    <nav role="navigation">
                        <div class="container">
                            <div class="row full-height align-items-center">
                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled menu">
                                        <li class="{{request()->routeIs('home.index') ? 'active' : ''}}" ><a href="{{route('home.index')}}">خانه</a></li>
                                        <li class="{{request()->routeIs('home.room.index') ? 'active' : ''}}" ><a href="{{route('home.room.index')}}">اقامتگاه ها</a></li>
                                        <li class="{{request()->routeIs('home.posts') ? 'active' : ''}}" ><a href="{{route('home.posts')}}">مقالات</a></li>
{{--                                        <li><a href="#">تماس با ما</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END head -->
