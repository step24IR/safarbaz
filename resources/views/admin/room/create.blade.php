@extends('admin.layouts.admin' , ['sectionName' => 'داشبورد'])

@section('title' , 'ایجاد اتاق')

@section('head')
    @vite(['resources/css/admin/ckeditor.css', 'resources/js/admin/ckeditor.js'])
@endsection


@section('scripts')
{{--    <script type="module" src="{{asset('AdminAssets/js/jquery.czMore-latest.js')}}"></script>--}}

    <script type="module">
        function getCities(){
            var provinceID = $('#province').val();
            if (provinceID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
                    success: function(res) {
                        if (res) {
                            $("#city_id").empty();

                            $.each(res, function(key, city) {
                                let selected = false;
                                if(city.id == "{{(old('city_id') === null) ? 153 : old('city_id')}}")
                                {
                                    selected = true;
                                }
                                let option = $('<option>' , {
                                    value:city.id,
                                    text:city.name,
                                    selected:selected,
                                })
                                $("#city_id").append(option);
                            });
                        } else {
                            $("#city_id").empty();
                        }
                    }
                });
            } else {
                $("#city_id").empty();
            }
        }
        getCities();
        $('#province').on('change' , getCities);
        $("#czContainer").czMore();

    </script>
@endsection

@section('content')
    <div class="card row">
        <div class="card-body px-5 py-4">
            <div class="d-flex justify-content-between">
                <div><h3 class="card-title mb-3">ایجاد اتاق</h3></div>
                <div><a href="{{route('admin.room.index')}}" class="btn btn-primary p-2">نمایش اتاقها</a></div>
            </div>
            <hr class="mb-5">

            <form action="{{route('admin.room.store')}}" method="post" enctype="multipart/form-data" id="file_form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="نام">
                        @error('name')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="scale">متراژ(متر):</label>
                        <input type="text" name="scale" class="form-control" value="{{old('scale')}}" id="scale" placeholder="متراژ"
                               onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                        @error('scale')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="capacity"> ظرفیت:</label>
                        <input type="text" name="capacity" class="form-control" id="capacity" value="{{old('capacity')}}" placeholder="ظرفیت">
                        @error('capacity')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="extra_people"> تعداد افراد اضافه:</label>
                        <input type="text" name="extra_people" class="form-control" id="extra_people" value="{{old('extra_people')}}" placeholder="تعداد افراد اضافه">
                        @error('extra_people')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price_per_extra_people"> مبلغ پرداختی برای هر فرد اضافه:</label>
                        <input type="text" name="price_per_extra_people" class="form-control" id="price_per_extra_people" value="{{old('price_per_extra_people')}}" placeholder="مبلغ پرداختی برای هر فرد اضافه">
                        @error('price_per_extra_people')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price_per_holiday"> قیمت روزهای تعطیل:</label>
                        <input type="text" name="price_per_holiday" class="form-control" id="price_per_holiday" value="{{old('price_per_holiday')}}" placeholder="قیمت روزهای تعطیل">
                        @error('price_per_holiday')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price_per_non_holiday"> قیمت روزهای غیر تعطیل:</label>
                        <input type="text" name="price_per_non_holiday" class="form-control" id="price_per_non_holiday" value="{{old('price_per_non_holiday')}}" placeholder="قیمت روزهای غیر تعطیل">
                        @error('price_per_non_holiday')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="province">استان:</label>
                        <select class="form-control" name="province" id="province">
                            @foreach($provinces as $province)
                                <option value="{{$province->id}}" @selected((old('province') == null) ?  ($province->id == 11) : (old('province') == $province->id))>{{$province->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="city_id">شهر:</label>
                        <select name="city_id" class="form-control" id="city_id">
                        </select>
                        @error('city_id')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="village"> نام روستا:</label>
                        <input type="text" name="village" class="form-control" id="village" value="{{old('village')}}" placeholder="نام روستا">
                        @error('village')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_rooms">تعداد اتاق:</label>
                        <select class="form-control" name="number_of_rooms" id="number_of_rooms">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_rooms') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_rooms')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_bedrooms">تعداد اتاق خواب:</label>
                        <select class="form-control" name="number_of_bedrooms" id="number_of_bedrooms">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_bedrooms') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_bedrooms')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_bed_one">تعداد تخت تک نفره:</label>
                        <select class="form-control" name="number_of_bed_one" id="number_of_bed_one">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_bed_one') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_bed_one')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_bed_two">تعداد تخت دونفره:</label>
                        <select class="form-control" name="number_of_bed_two" id="number_of_bed_two">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_bed_two') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_bed_two')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_wc_iranian">تعداد سرویس ایرانی:</label>
                        <select class="form-control" name="number_of_wc_iranian" id="number_of_wc_iranian">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_wc_iranian') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_wc_iranian')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_wc_frangi">تعداد سرویس فرنگی:</label>
                        <select class="form-control" name="number_of_wc_frangi" id="number_of_wc_frangi">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('wc_frangi') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_wc_frangi')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_tub_bathroom">تعداد حمام با وان:</label>
                        <select class="form-control" name="number_of_tub_bathroom" id="number_of_tub_bathroom">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_bathroom') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_tub_bathroom')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_normal_bathroom">تعداد حمام معمولی:</label>
                        <select class="form-control" name="number_of_normal_bathroom" id="number_of_normal_bathroom">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('number_of_normal_bathroom') == $num)>{{$num}} </option>
                            @endforeach
                        </select>
                        @error('number_of_normal_bathroom')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 floor">
                        <label for="floor">شماره طبقه:</label>
                        <select class="form-control" name="floor" id="floor">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected(old('floor') == $num)>
                                    @if($num === 0)
                                        همکف
                                    @else
                                        {{$num}}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('floor')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="images">عکسها:</label>
                        <input type="file" name="images[]" class="form-control" id="images"  multiple="multiple" placeholder="عکسها">
                        @error('images')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="textureAndView"> بافت و چشم انداز:</label>
                        <input type="text" name="textureAndView" class="form-control" id="textureAndView" value="{{old('textureAndView')}}" placeholder="بافت و چشم انداز">
                        @error('textureAndView')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">آدرس:</label>
                        <textarea name="address" class="form-control" id="address" placeholder="آدرس" rows="3">{{old('address')}}</textarea>
                        @error('address')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group exclusive">
                        <div class="form-check">
                            <label for="exclusive" class="form-check-label">
                                <input type="checkbox" name="exclusive" id="exclusive" class="form-check-input" @checked(old('exclusive') == 'on')>دربست
                            </label>
                        </div>
                        @error('exclusive')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>توضیحات:</label>
                        <div class=" text-dark">
                            <textarea name="description" id="editor" placeholder="توضیحات" rows="3">{{old('description')}}</textarea>
                        </div>
                        @error('description')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <h3 class="mt-4">امکانات اقامتگاه:</h3>
                    <p class="mb-4">مقادیر را با ویرگول از هم جدا کنید.</p>
                    <div id="czContainer">
                        <div id="first">
                            <div class="recordset">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label> نام:</label>
                                        <select class="form-control" name="facilities[facility_id][]">
                                            @foreach($facilities as $facility)
                                                <option value="{{$facility->id}}">{{$facility->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label> مقدار:</label>
                                        <input type="text" name="facilities[value][]" class="form-control" placeholder="مقدار">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-3">
                    <input type="hidden" name="type_file" value="business">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ایجاد</button>
                </div>
            </form>
        </div>
    </div>
@endsection

{{--@section('content')--}}
{{--    <div class="card row">--}}
{{--        <div class="card-body px-5 py-4">--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <div><h3 class="card-title mb-3">ایجاد اتاق</h3></div>--}}
{{--                <div><a href="{{route('admin.room.index')}}" class="btn btn-primary p-2">نمایش اتاقها</a></div>--}}
{{--            </div>--}}
{{--            <hr>--}}
{{--            <form action="{{route('admin.room.store')}}" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}

{{--                <div class="row">--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="name"> نام:</label>--}}
{{--                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="نام">--}}
{{--                        @error('name')--}}
{{--                        <div class="alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="capacity"> ظرفیت:</label>--}}
{{--                        <input type="text" name="capacity" class="form-control" id="capacity" value="{{old('capacity')}}" placeholder="ظرفیت">--}}
{{--                        @error('capacity')--}}
{{--                        <div class="alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="daily_rate"> قیمت هر شب:</label>--}}
{{--                        <input type="text" name="daily_rate" class="form-control" id="daily_rate" value="{{old('daily_rate')}}" placeholder="قیمت هر شب">--}}
{{--                        @error('daily_rate')--}}
{{--                        <div class="alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="province">استان:</label>--}}
{{--                        <select class="form-control" name="province" id="province">--}}
{{--                            @foreach($provinces as $province)--}}
{{--                                <option value="{{$province->id}}" @selected((old('province') == null) ?  $province->id == 11 : old('$province') == $province->id)>{{$province->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="city">شهر:</label>--}}
{{--                        <select name="city_id" class="form-control" id="city">--}}
{{--                        </select>--}}
{{--                        @error('city_id')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="village"> نام روستا:</label>--}}
{{--                        <input type="text" name="village" class="form-control" id="village" value="{{old('village')}}" placeholder="نام روستا">--}}
{{--                        @error('village')--}}
{{--                        <div class="alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="address"> ادرس:</label>--}}
{{--                        <input type="text" name="address" class="form-control" id="address" value="{{old('address')}}" placeholder="ادرس">--}}
{{--                        @error('address')--}}
{{--                        <div class="alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-3">--}}
{{--                        <label for="images">عکسها:</label>--}}
{{--                        <input type="file" name="images[]" class="form-control" id="images"  multiple="multiple" placeholder="عکسها">--}}
{{--                        @error('images')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="description"> توضیحات:</label>--}}
{{--                            <main class="text-dark">--}}
{{--                                <textarea class="form-control" name="description" id="editor" placeholder="توضیحات">{{old('description')}}</textarea>--}}
{{--                            </main>--}}
{{--                        @error('description')--}}
{{--                        <div class="alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row row-cols-md-5">--}}
{{--                    <div class="form-group col exclusive">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="exclusive" class="form-check-label">--}}
{{--                                <input type="checkbox" name="exclusive" id="exclusive" class="form-check-input" @checked(old('exclusive') == 'on')>دربست--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('exclusive')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col elevator">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="elevator" class="form-check-label">--}}
{{--                                <input type="checkbox" name="elevator" id="elevator" class="form-check-input" @checked(old('elevator') == 'on')>اسانسور--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('elevator')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col parking">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="parking" class="form-check-label">--}}
{{--                                <input type="checkbox" name="parking" id="parking" class="form-check-input" @checked(old('parking') == 'on')>پارکینگ--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('parking')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col air_conditioning_system">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="air_conditioning_system" class="form-check-label">--}}
{{--                                <input type="checkbox" name="air_conditioning_system" id="air_conditioning_system" class="form-check-input" @checked(old('air_conditioning_system') == 'on')>سیستم تهویه--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('air_conditioning_system')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col yard">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="yard" class="form-check-label">--}}
{{--                                <input type="checkbox" name="yard" id="yard" class="form-check-input" @checked(old('yard') == 'on')>حیاط--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('yard')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col pool">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="pool" class="form-check-label">--}}
{{--                                <input type="checkbox" name="pool" id="pool" class="form-check-input" @checked(old('pool') == 'on')>استخر--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('pool')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col sauna">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="sauna" class="form-check-label">--}}
{{--                                <input type="checkbox" name="sauna" id="sauna" class="form-check-input" @checked(old('sauna') == 'on')>سونا--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('sauna')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="form-group col Jacuzzi">--}}
{{--                        <div class="form-check">--}}
{{--                            <label for="Jacuzzi" class="form-check-label">--}}
{{--                                <input type="checkbox" name="Jacuzzi" id="Jacuzzi" class="form-check-input" @checked(old('Jacuzzi') == 'on')>جکوزی--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        @error('Jacuzzi')--}}
{{--                        <div class="error text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-center pt-3">--}}
{{--                    <button type="submit" class="btn btn-primary w-100 enter-btn">ایجاد</button>--}}
{{--                </div>--}}

{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
