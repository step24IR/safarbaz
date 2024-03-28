@extends('home.layouts.home' , ['sectionName' => 'داشبورد'])

@section('title' , 'اتاق ها')

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
                        to.options = {minDate: unix +  86400000};
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
                    from.touched = true;
                    if (to && to.options && to.options.minDate != unix) {
                        var cachedValue = to.getState().selected.unixDate;
                        to.options = {minDate: unix - 86400000};
                        if (to.touched) {
                            to.setDate(cachedValue);
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

    <section class="site-hero inner-page overlay" style="background-image: url('{{asset('HomeAssets/images/hero_4.jpg')}}')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">اجاره ویلا و سوئیت در مشهد</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="{{route('home.index')}}">خانه</a></li>
                        <li>&bullet;</li>
                        <li>اقامتگاه ها</li>
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

    <section class="section pb-0">
        <div class="container">
            <div class="row check-availabilty" id="next" data-aos="fade-up" data-aos-offset="-200">
                <div class="block-32">
                    <form action="{{route('home.room.search')}}" method="post" id="search">
                        @csrf
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

                <section class="section w-100" id="next">
                    <div class="container">
                        <div class="row">
                            @foreach($rooms as $room)
                                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                                    <a href="{{route('home.room.show' , ['room' => $room->id])}}" class="room">
                                        <figure class="img-wrap">
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

                        {{$rooms->onEachSide(3)->links('home.sections.pagination')}}
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
