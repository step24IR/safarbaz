@extends('home.layouts.home' , ['isBlog' => true])

@section('title' , 'سفرباز | نمایش مقالات')

@section('meta_tags')
    <meta name="description" content="با سفرباز به گشت و گذار در دنیای جذاب مقالات گردشگری مشهد بپردازید. در این بخش می توانید مقالاتی متنوع و خواندنی راجع به جاذبه های گردشگری، فرهنگ و تاریخ مشهد، بهترین زمان سفر به مشهد، غذاهای محلی و ... مطالعه کنید." />
    <meta name="keywords" content="مقالات گردشگری مشهد، جاذبه های گردشگری مشهد، فرهنگ مشهد، تاریخ مشهد، بهترین زمان سفر به مشهد، غذاهای محلی مشهد،
     سوغات مشهد، اقامت در مشهد، حمل و نقل در مشهد، گردشگری مذهبی مشهد، گردشگری تفریحی مشهد، گردشگری طبیعت گردی مشهد">
@endsection

@section('head')

    <style>
        .image-container
        {
            width: 100%;
            padding-top: 56.25%;
            position: relative;
            overflow: hidden;
        }
        .image-container img
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@section('scripts')
@endsection

@section('content')
    <section class="site-hero inner-page overlay" style="background-image: url('{{asset('HomeAssets/images/hero_5.jpg')}}')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">اجاره سوئیت و اقامتگاه بوم گردی در مناطق گردشگری مشهد</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="{{route('home.index')}}">خانه</a></li>
                        <li>&bullet;</li>
                        <li>مقالات</li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->

    <section class="section blog-post-entry bg-light" id="next">
      <div class="container">

        <div class="row text-right">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="media media-custom d-block mb-4 h-100">
                        <a href="{{route('home.posts.show' , ['post' => $post->id])}}" class="mb-4 d-block">
                            <div class="image-container">
                                <img src="{{asset(env('BLOG_IMAGES_UPLOAD_PATH').$post->image)}}" alt="Image placeholder" class="img-fluid">
                            </div>
                        </a>
                        <div class="media-body">
                            <h2 class="mt-0 mb-3"><a href="{{route('home.posts.show' , ['post' => $post->id])}}">{{$post->title}}</a></h2>
                            <span class="meta-post">{{verta($post->updated_at)->format('Y-m-d')}}</span>
                            <p>{!! \Illuminate\Support\Str::limit($post->text, 90, '...') !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
          {{$posts->onEachSide(3)->links('home.sections.pagination')}}

      </div>
    </section>
    <section class="section bg-image overlay" style="background-image: url('{{asset('HomeAssets/images/hero_5.jpg')}}');">
        <div class="container" >
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-right" data-aos="fade-up">
                    <h2 class="text-white font-weight-bold">بهترین اقامتگاه ها برای رزرو!</h2>
                </div>
                <div class="col-12 col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{route('home.room.index')}}" class="btn btn-outline-white-primary py-3 text-white px-5">رزرو فوری</a>
                </div>
            </div>
        </div>
    </section>
@endsection
