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
                                        <li class="{{request()->is('') ? 'active' : ''}}" ><a href="{{route('home.index')}}">خانه</a></li>
                                        <li class="{{request()->is('rooms') ? 'active' : ''}}" ><a href="{{route('home.room.index')}}">اقامتگاه ها</a></li>
                                        <li class="{{request()->is('posts') ? 'active' : ''}}" ><a href="{{route('home.posts')}}">مقالات</a></li>
                                        @if($isBlog)
                                            @foreach(\App\Models\Category::where('parent_id' , 0)->get() as $category)
                                                @if($category->children->count() > 0)
                                                    <li class="dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                            {{$category->name}}
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            @foreach($category->children as $childCategory)
                                                                <a class="{{request()->is('category/'.$childCategory->slug) ? 'active' : ''}}" class="dropdown-item" href="{{route('home.posts.category' , ['category' => $childCategory->slug])}}">{{$childCategory->name}}</a>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="{{request()->is('category/'.$category->slug) ? 'active' : ''}}" ><a href="{{route('home.posts.category' , ['category' => $category->slug])}}">{{$category->name}}</a></li>
                                                @endif
                                            @endforeach
                                        @endif
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
