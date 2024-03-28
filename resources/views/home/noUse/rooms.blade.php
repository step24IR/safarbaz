@extends('home.layouts.home' , ['sectionName' => 'داشبورد'])

@section('title' , 'اتاق ها')

@section('head')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#checkin_date").persianDatepicker({
                initialValue: false,
                minDate: new persianDate(),
                format: 'YYYY/MM/DD',
                autoClose: true,
                toolbox:{
                    calendarSwitch:{
                        enabled:false,
                    }
                },
                // onSelect:function ()
                // {
                //     $('#expire_date').siblings('.error').remove()
                //     console.log($('#expire_date').siblings('.error').get(0))
                //     $('#expire_date').siblings('#expire_date-error').remove()
                // }
            });
        });
        $(document).ready(function() {
            $("#checkout_date").persianDatepicker({
                initialValue: false,
                minDate: new persianDate(),
                format: 'YYYY/MM/DD',
                autoClose: true,
                toolbox:{
                    calendarSwitch:{
                        enabled:false,
                    }
                },
                // onSelect:function ()
                // {
                //     $('#expire_date').siblings('.error').remove()
                //     console.log($('#expire_date').siblings('.error').get(0))
                //     $('#expire_date').siblings('#expire_date-error').remove()
                // }
            });
        });
    </script>
@endsection

@section('content')
    <section class="site-hero inner-page overlay" style="background-image: url('{{asset('HomeAssets/images/hero_4.jpg')}}')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">اجاره ویلا و سوئیت در مشهد</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="{{route('home.index')}}">خانه</a></li>
                        <li>&bullet;</li>
                        <li>اتاق ها</li>
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

    <section class="section pb-4">
        <div class="container">

            <div class="row check-availabilty" id="next">
                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3 text-right">
                                <label for="checkin_date" class="font-weight-bold text-black">تاریخ ورود</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="text" id="checkin_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3 text-right">
                                <label for="checkout_date" class="font-weight-bold text-black">تاریخ خروج</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="text" id="checkout_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0 col-lg-3 text-right">
                                <div class="row">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label for="adults" class="font-weight-bold text-right text-black">تعداد نفرات</label>
                                        <div class="field-icon-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="adults" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4+</option>
                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-6 mb-3 mb-md-0">--}}
{{--                                        <label for="children" class="font-weight-bold text-black">Children</label>--}}
{{--                                        <div class="field-icon-wrap">--}}
{{--                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>--}}
{{--                                            <select name="" id="children" class="form-control">--}}
{{--                                                <option value="">1</option>--}}
{{--                                                <option value="">2</option>--}}
{{--                                                <option value="">3</option>--}}
{{--                                                <option value="">4+</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 align-self-end">
                                <button class="btn btn-primary btn-block text-white">جستوجو</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{asset('HomeAssets/images/img_1.jpg')}}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>تک خواب</h2>
                            <span class="text-uppercase letter-spacing-1">  هر شب از/900,000 تومان</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{asset('HomeAssets/images/img_2.jpg')}}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>اتاق خانوادگی</h2>
                            <span class="text-uppercase letter-spacing-1">هر شب از/1200,000 تومان</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{asset('HomeAssets/images/img_3.jpg')}}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>اتاق سلطنتی</h2>
                            <span class="text-uppercase letter-spacing-1">هر شب از/2500,000 تومان</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{asset('HomeAssets/images/img_1.jpg')}}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>تک خواب</h2>
                            <span class="text-uppercase letter-spacing-1">  هر شب از/900,000 تومان</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{asset('HomeAssets/images/img_2.jpg')}}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>اتاق خانوادگی</h2>
                            <span class="text-uppercase letter-spacing-1">هر شب از/1200,000 تومان</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="{{asset('HomeAssets/images/img_3.jpg')}}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>اتاق سلطنتی</h2>
                            <span class="text-uppercase letter-spacing-1">هر شب از/2500,000 تومان</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="section bg-light">

        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade">بهترین پیشنهادها</h2>
                    <p data-aos="fade">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                </div>
            </div>

            <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                <a href="#" class="image d-block bg-image-2" style="background-image: url('{{asset('HomeAssets/images/img_1.jpg')}}');"></a>
                <div class="text">
                    <span class="d-block mb-4"><span class="display-4 text-primary">199,000 تومان</span> <span class="text-uppercase letter-spacing-2">/ برای هر شب</span> </span>
                    <h2 class="mb-4">اتاق خانوادگی</h2>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    <p><a href="#" class="btn btn-primary text-white">رزرو فوری</a></p>
                </div>
            </div>
            <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
                <a href="#" class="image d-block bg-image-2 order-2" style="background-image: url('{{asset('HomeAssets/images/img_2.jpg')}}');"></a>
                <div class="text order-1">
                    <span class="d-block mb-4"><span class="display-4 text-primary">299,000 تومان</span> <span class="text-uppercase letter-spacing-2">/ برای هر شب</span> </span>
                    <h2 class="mb-4">اتاق سلطنتی</h2>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    <p><a href="#" class="btn btn-primary text-white">رزرو فوری</a></p>
                </div>
            </div>

        </div>
    </section>
@endsection

