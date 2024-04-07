@extends('home.layouts.home' , ['isBlog' => false])

@section('title' , 'خانه')

@section('head')
    <style>
        .select2-container .select2-selection--multiple {
            height: 50px !important;
        }
        .select2-selection {
            border-color: #CED4DA !important; /* example */
        }

        #parent-location .icon{
            display: none;
        }
        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice
        {
            float: right !important;
            margin-top: 8px !important;
            margin-right: 0.375rem !important;
        }
        #parent-location {
            /* can be any value */
            text-align: right;
            direction: rtl;
            position: relative;
            /*z-index: 9999;*/
        }
        #location + span {
            width: 100% !important;
        }
        #parent-location .select2-container--open + .select2-container--open {
            left: auto;
            right: 0;
        }
        #search {
            z-index: 9999;
        }
        .messageBox {
            position: fixed;
            padding: 20px;
            top: 15%;
            left: 50%;
            z-index: 999;
            background: rgba(0,0,0,1);
            transform: translate(-50%, -50%);
        }
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
        /*.room .image-container img {*/
        /*    transition: .3s all ease-in-out;*/
        /*    transform: scale(1);*/
        /*    margin-bottom: 0 !important;*/
        /*}*/
        /*.room:hover .image-container img, .room:focus .image-container img {*/
        /*    transform: scale(1.05);*/
        /*}*/

    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let cities =@json($cities);

            let from = $("#start_time").persianDatepicker({
                initialValue: false,
                minDate: new persianDate(),
                format: 'YYYY/MM/DD',
                autoClose: true,
                toolbox:{
                    calendarSwitch:{
                        enabled:false,
                    }
                },
                onSelect: function (unix) {
                    from.touched = true;
                    if (to && to.options && to.options.minDate != unix) {
                        var cachedValue = to.getState().selected.unixDate;
                        to.options = {minDate: unix + 86400000};
                        if (to.touched) {
                            to.setDate(cachedValue);
                        }
                    }
                },
            });
            let to = $("#end_time").persianDatepicker({
                initialValue: false,
                minDate: new persianDate(),
                format: 'YYYY/MM/DD',
                autoClose: true,
                toolbox:{
                    calendarSwitch:{
                        enabled:false,
                    }
                },
                onSelect: function (unix) {
                    to.touched = true;
                    if (from && from.options && from.options.maxDate != unix) {
                        var cachedValue = from.getState().selected.unixDate;
                        from.options = {maxDate: unix - 86400000};
                        if (from.touched) {
                            from.setDate(cachedValue);
                        }
                    }
                },
            });
            function matchCustom(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Do not display the item if there is no 'text' property
                if (typeof data.text === 'undefined') {
                    return null;
                }

                // `params.term` should be the term that is used for searching
                // `data.text` is the text that is displayed for the data object
                if (data.text.indexOf(params.term) > -1) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.text += ' (matched)';

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $("#location").select2({
                dir: "rtl",
                data: cities,
                matcher: matchCustom,
                dropdownParent: $('#parent-location'),
                maximumSelectionLength: 1,
                // minimumResultsForSearch: 20,
            });
            // $('#location').on('select2:select', function() {
            //     //use select or use select#yourid where you need to focus
            //     $(this).parent('.parent').next('div').find('input').focus();
            //     console.log($(this).parent('.parent').next("a").get(0));
            // });

            $('.btn-close').on('click' , function (){
                $('#message').remove()
            })
            setTimeout(function() {
                $('#message').remove();
            }, 10000);
        });
    </script>
@endsection

@section('content')
    @if ($errors->any())
        <div class="bg-danger w-75 mx-auto d-flex justify-content-between messageBox" id="message">
            <ul class="text-white">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div>
                <button type="button" class="btn-close btn btn-outline-light"> X </button>
            </div>
        </div>
    @endif
    @if (session()->has('errorMessage'))
        <div class="bg-danger w-75 text-white mx-auto d-flex justify-content-between messageBox" id="message">
            {{session('errorMessage')}}
            <div>
                <button type="button" class="btn-close btn btn-outline-light"> X </button>
            </div>
        </div>
    @endif

    <section class="site-hero inner-page overlay" style="background-image: url('{{asset('HomeAssets/images/hero_5.jpg')}}')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <span class="custom-caption text-uppercase text-white d-block  mb-3">به سفرباز خوش امدید</span>
                    <h1 class="heading mb-3">اجاره ویلا و سوئیت در مشهد</h1>
                    <ul class="custom-breadcrumbs mb-4">
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

    <section class="section bg-light pb-0">
        <div class="container">
            <div class="row check-availabilty" data-aos="fade-up" data-aos-offset="-200" id="next">
                <div class="block-32">

                    <form action="{{route('home.room.search')}}" id="search">
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-lg-0 col-lg-2 text-right" id="parent-location">
                                <label for="children" class="font-weight-bold text-black">شهر یا روستا</label>
                                <select name="location" id="location" class="form-control"  multiple="multiple">
                                </select>
                            </div>
                            <div class="col-md-4 mb-3 mb-lg-0 col-lg-3 text-right">
                                <label for="start_time" class="font-weight-bold text-black">تاریخ ورود</label>
                                <input type="text" name="start_time" id="start_time" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-md-4 mb-3 mb-lg-0 col-lg-3 text-right">
                                <label for="end_time" class="font-weight-bold text-black">تاریخ خروج</label>
                                <input type="text" name="end_time" id="end_time" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-2 text-right">
                                <label for="number_of_person" class="font-weight-bold text-right text-black">تعداد نفرات</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="number_of_person" id="number_of_person" class="form-control">
                                        @foreach(range(1,50) as $num)
                                            <option value="{{$num}}">{{$num}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-2 align-self-end">
                                <button class="btn btn-primary btn-block text-white">جستوجو</button>
                            </div>
                        </div>
                    </form>
                </div>
                <section class="py-5 bg-light text-right">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7 ml-auto order-lg-1 position-relative mb-5" data-aos="fade-up">
                                <figure class="img-absolute">
                                    <img src="{{asset('HomeAssets/images/food-1.jpg')}}" alt="Image" class="img-fluid">
                                </figure>
                                <img src="{{asset('HomeAssets/images/img_1.jpg')}}" alt="Image" class="img-fluid rounded">
                            </div>
                            <div class="col-md-12 col-lg-4 order-lg-2 mt-lg-0 mt-5" data-aos="fade-up">
                                <h2 class="heading">خوش امدید!</h2>
                                <p class="mb-4">سفرباز سامانه اجاره اقامتگاه برای مسافران است و هدف از ایجاد سفرباز ترویج سفرهای اقتصادی، مناسب برای تمام افراد جامعه و گردشگران است. در همین راستا تلاش می‌کنیم اقامتگاه‌هایی امن را با کم‌ترین هزینه در اختیار کاربران قرار دهیم.</p>
{{--                                <p><a href="#" class="btn btn-primary text-white py-2 mr-3">بیشتر...</a></p>--}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section class="section testimonial-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">اقامتگاه ها</h2>
                    <p data-aos="fade-up" data-aos-delay="100">اخرین اقامتگاه ها</p>
                </div>
            </div>
            <div class="row">
                <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                    @foreach($rooms as $room)
                        <div class="testimonial text-center slider-item">
                            <a href="{{route('home.room.show' , ['room' => $room->id])}}" class="room">
                                <figure class="image-container">
                                    <img src="{{asset(env('ROOM_IMAGES_UPLOAD_PATH').$room->images()->first()->image)}}" alt="Free website template" class="img-fluid mb-3">
                                </figure>
                                <div class="p-3 text-center room-info">
                                    <h2>{{$room->name}}</h2>
                                    <span>  قیمت روزهای تعطیل/{{$room->price_per_holiday}}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- END slider -->
            </div>
        </div>
    </section>

    <section class="section slider-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">عکس ها</h2>
                    <p data-aos="fade-up" data-aos-delay="100">تصاویری از اقامتگاه های ما</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        @foreach($roomImages as $roomImage)
                            <div class="slider-item">
                                <a href="{{asset(env('ROOM_IMAGES_UPLOAD_PATH').$roomImage->image)}}" data-fancybox="images" data-caption="Caption for this image">
                                    <div class="image-container">
                                        <img src="{{asset(env('ROOM_IMAGES_UPLOAD_PATH').$roomImage->image)}}" alt="Image placeholder" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- END slider -->
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

{{--    <section class="section bg-image overlay" style="background-image: url('{{asset('HomeAssets/images/hero_3.jpg')}}');">--}}
    <section class="section blog-post-entry">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">مقالات</h2>
{{--                    <p data-aos="fade-up" data-aos-delay="100">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>--}}
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="300">
                        <div class="media media-custom d-block mb-4 h-100">
                            <a href="{{route('home.posts.show' , ['post' => $post->id])}}" class="mb-4 d-block">
                                <div class="image-container">
                                    <img src="{{asset(env('BLOG_IMAGES_UPLOAD_PATH').$post->image)}}" alt="Image placeholder" class="img-fluid">
                                </div>
                            </a>
                            <div class="media-body text-right">
                                <span class="meta-post">{{verta($post->updated_at)->format('Y-m-d')}}</span>
                                <h2 class="mt-0 mb-3"><a href="{{route('home.posts.show' , ['post' => $post->id])}}">{{$post->title}}</a></h2>
                                <p>{!!   \Illuminate\Support\Str::limit($post->text, 90, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section bg-image overlay" style="background-image: url('{{asset('HomeAssets/images/hero_5.jpg')}}');">
        <div class="container" >
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-right" data-aos="fade-up">
                    <h2 class="text-white font-weight-bold">بهترین اقامتگاه ها برای رزرو!</h2>
                </div>
                <div class="col-12 col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{route('home.room.index')}}" class="btn btn-outline-white-primary py-3 text-white px-5">رزرو فوری</a>
                </div>
            </div>
        </div>
    </section>

@endsection

