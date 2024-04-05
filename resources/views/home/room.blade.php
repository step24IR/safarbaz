@extends('home.layouts.home' , ['isBlog' => false])

@section('title' , 'اقامتگاه')

@section('head')
    <style>
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
            background-color: red;
            width: 100%;
            padding-top: 56.25%;
            position: relative;
            /*transform: translate(0, -50%);*/
        }
        .image-container img
        {
            position: absolute;
            top: 25%;
            left: 0;
            bottom: 0;
            right: 0;
        }
    </style>
@endsection

@section('scripts')
    <script type="module">
        $(document).ready(function() {
            let reservations = @json($reservations);

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
                         to.options = {minDate: unix +  86400000};
                         if (to.touched) {
                             to.setDate(cachedValue);
                         }
                     }
                 },
                 checkDate: function(unix){
                     let resv = reservations.filter(function (reservation){
                         return  new persianDate(unix).toLocale('en').format('YYYY-MM-DD') >= reservation.start_time
                             && new persianDate(unix).toLocale('en').format('YYYY-MM-DD') < reservation.end_time;
                     })
                     return resv.length <= 0;
                 }
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
                checkDate: function(unix){
                    let resv = reservations.filter(function (reservation){
                        return  new persianDate(unix).toLocale('en').format('YYYY-MM-DD') >= reservation.start_time
                            && new persianDate(unix).toLocale('en').format('YYYY-MM-DD') < reservation.end_time;
                    })
                    return resv.length <= 0;
                }
            });

            $('.btn-close').on('click' , function (){
                $('#message').remove()
            })
            setTimeout(function() {
                $('#message').remove();
            }, 10000);

            let images = $('.image-container img');

            images.each(function() {
                let width = $(this).width();
                let height = $(this).height();

                let aspectRatio = width / height;

                if (aspectRatio > 1) {
                    $(this).css({
                        translate: '0 0'
                    });
                } else {
                    $(this).css({
                        translate: '0 -25%'
                    });
                }
            })

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
    @if (session()->has('message'))
        <div class="bg-success w-75 text-white mx-auto d-flex justify-content-between messageBox" id="message">
            {{session('message')}}
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

    <section class="site-hero inner-page overlay" style="background-image: url('{{asset('HomeAssets/images/hero_4.jpg')}}')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">{{$room->name}}</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="{{route('home.index')}}">خانه</a></li>
                        <li>&bullet;</li>
                        <li>{{$room->name}}</li>
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

    <section class="section slider-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">عکس های اقامتگاه</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        @foreach($room->images as $roomImage)
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

    <section class="section contact-section" id="next">
      <div class="container">
          <div class="row justify-content-center text-center mb-5">
              <div class="col-md-7">
                  <h2 class="heading" data-aos="fade-up">اطلاعات اقامتگاه</h2>
              </div>
          </div>
          <div class="row text-right">
            <div class="col-md-7" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-10 ml-auto">
                        <p>
                            <h3 class="mb-4">درباره اقامتگاه:</h3>
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <div>
                                        <h5>قیمت</h5>
                                        <p class="p-0 m-0">{{'قیمت روزهای تعطیل '.($room->price_per_holiday)}} ,{{'قیمت روزهای غیر تعطیل '.($room->price_per_non_holiday)}} ,{{'هر نفر اضافه '.($room->price_per_extra_people)}}</p>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div>
                                        <h5>زمان ورود و خروج</h5>
                                        <p class="p-0 m-0">زمان ورود ساعت 14:00 , زمان خروج ساعت 12:00</p>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div>
                                        <h5>اطلاعات اصلی اقامتگاه</h5>
                                        <p class="p-0 m-0">{{$room->scale}} ,{{$room->number_of_rooms ?$room->number_of_rooms. 'اتاق ,':''}} {{$room->floor == 0 ? 'همکف' : 'طبقه ی '.$room->floor}}
                                            @if($room->exclusive)
                                                ,دربست
                                            @else
                                                ,غیردربست
                                            @endif
                                        </p>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div>
                                        <h5>ظرفیت اقامتگاه</h5>
                                        <p class="p-0 m-0">{{$room->capacity ?? ''}}  {{$room->extra_people ? ',' . $room->extra_people : ''}} </p>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div>
                                        <h5>سرویس خواب</h5>
                                        <p class="p-0 m-0">
                                            {{$room->number_of_bedrooms ? $room->number_of_bedrooms . ' اتاق خواب,' : ''}}
                                            {{$room->number_of_bed_one ? $room->number_of_bed_one . ' تخت یک نفره,' : ''}}
                                            {{$room->number_of_bed_two ? $room->number_of_bed_two . ' تخت دونفره' : ''}}
                                        </p>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div>
                                        <h5>سرویس بهداشتی و حمام</h5>
                                        <p class="p-0 m-0">
                                            {{$room->number_of_wc_iranian ? $room->number_of_wc_iranian . ' سرویس ایرانی,' : ''}}
                                            {{$room->number_of_wc_frangi ? $room->number_of_wc_frangi . ' سرویس فرنگی,' : ''}}
                                            {{$room->number_of_tub_bathroom ? $room->number_of_tub_bathroom . ' حمام با وان,' : ''}}
                                            {{$room->number_of_normal_bathroom ? $room->number_of_normal_bathroom . ' حمام معمولی,' : ''}}
                                        </p>
                                    </div>
                                </li>
                                @if($room->textureAndView)
                                    <li class="mb-4">
                                        <div>
                                            <h5>بافت و چشم انداز</h5>
                                            <p class="p-0 m-0">{{$room->textureAndView}}</p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                            <hr>
                        </p>
                        @if($room->description)
                            <p>
                                <h3 class="mb-4">توضیحات:</h3>
                                <p class="mr-3">{!! $room->description !!}</p>
                                <hr>
                            </p>
                        @endif
                        @if($room->facilityValues->count() > 0 )
                            <p>
                                <h3 class="mb-4">امکانات اقامتگاه:</h3>
                                <ul class="list-unstyled">
                                    @foreach($facilities as $facility)
                                        @if($room->facilityValues()->where('facility_id' , $facility->id)->exists())
                                            <li class="mb-4">
                                                <div>
                                                    <h5>{{$facility->name}}</h5>
                                                    <p class="p-0 m-0">{{implode("," , $room->facilityValues()->where('facility_id' , $facility->id)->pluck('value')->toArray())}}</p>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-5" data-aos="fade-up">
                <div>بعد از ثبت اطلاعات در فرم زیر با شما تماس گرفته خواهد شد.(لطفا شماره تلفن را صحیح وارد کنید.)</div>

            <form action="{{route('home.room.book')}}" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                @csrf
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="name">نام</label>
                  <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control ">
                </div>
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="number">شماره همراه</label>
                  <input type="text" name="number" id="number" value="{{old('number')}}" class="form-control ">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">تاریخ شروع</label>
                    <input type="text" name="start_time" id="start_time" value="{{old('start_time')}}" class="form-control" autocomplete="off" onkeypress="return false">
                </div>
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">تاریخ پایان</label>
                    <input type="text" name="end_time" id="end_time" value="{{old('end_time')}}" class="form-control" autocomplete="off" onkeypress="return false">
                </div>
              </div>
              <input type="hidden" name="room_id" value="{{$room->id}}">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="adults" class="font-weight-bold text-black">تعداد نفرات</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="number_of_person" id="number_of_person" class="form-control">
                          @foreach(range(1,50) as $num)
                              <option value="{{$num}}">{{$num}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="description">توضیحات</label>
                  <textarea name="description" id="description" class="form-control " cols="30" rows="8">{{old('description')}}</textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="رزرو" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                </div>
              </div>
            </form>
            <div class="d-flex justify-content-between"><span>شماره تلفن جهت رزرو به صورت تلفنی:</span><span>0935999999999</span> </div>
            </div>
        </div>
      </div>
    </section>

{{--    <section class="section testimonial-section bg-light">--}}
{{--      <div class="container">--}}
{{--        <div class="row justify-content-center text-center mb-5">--}}
{{--          <div class="col-md-7">--}}
{{--            <h2 class="heading" data-aos="fade-up">People Says</h2>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">--}}

{{--            <div class="testimonial text-center slider-item">--}}
{{--              <div class="author-image mb-3">--}}
{{--                <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">--}}
{{--              </div>--}}
{{--              <blockquote>--}}

{{--                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>--}}
{{--              </blockquote>--}}
{{--              <p><em>&mdash; Jean Smith</em></p>--}}
{{--            </div>--}}

{{--            <div class="testimonial text-center slider-item">--}}
{{--              <div class="author-image mb-3">--}}
{{--                <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">--}}
{{--              </div>--}}
{{--              <blockquote>--}}
{{--                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>--}}
{{--              </blockquote>--}}
{{--              <p><em>&mdash; John Doe</em></p>--}}
{{--            </div>--}}

{{--            <div class="testimonial text-center slider-item">--}}
{{--              <div class="author-image mb-3">--}}
{{--                <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">--}}
{{--              </div>--}}
{{--              <blockquote>--}}

{{--                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>--}}
{{--              </blockquote>--}}
{{--              <p><em>&mdash; John Doe</em></p>--}}
{{--            </div>--}}


{{--            <div class="testimonial text-center slider-item">--}}
{{--              <div class="author-image mb-3">--}}
{{--                <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">--}}
{{--              </div>--}}
{{--              <blockquote>--}}

{{--                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>--}}
{{--              </blockquote>--}}
{{--              <p><em>&mdash; Jean Smith</em></p>--}}
{{--            </div>--}}

{{--            <div class="testimonial text-center slider-item">--}}
{{--              <div class="author-image mb-3">--}}
{{--                <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">--}}
{{--              </div>--}}
{{--              <blockquote>--}}
{{--                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>--}}
{{--              </blockquote>--}}
{{--              <p><em>&mdash; John Doe</em></p>--}}
{{--            </div>--}}

{{--            <div class="testimonial text-center slider-item">--}}
{{--              <div class="author-image mb-3">--}}
{{--                <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">--}}
{{--              </div>--}}
{{--              <blockquote>--}}

{{--                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>--}}
{{--              </blockquote>--}}
{{--              <p><em>&mdash; John Doe</em></p>--}}
{{--            </div>--}}

{{--          </div>--}}
{{--            <!-- END slider -->--}}
{{--        </div>--}}

{{--      </div>--}}
{{--    </section>--}}
@endsection
