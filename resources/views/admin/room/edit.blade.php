@extends('admin.layouts.admin' , ['sectionName' => 'ویرایش اتاق'])

@section('title' , 'ویرایش اتاق')

@section('head')
    @vite(['resources/css/admin/ckeditor.css', 'resources/js/admin/ckeditor.js'])
    <style>
        .btn-minus{
            float: right;
            color: red;
            height:25px;
            width:25px;
            cursor:pointer;
        }
    </style>
@endsection


@section('scripts')
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
                                if(city.id == "{{$room->city_id}}")
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

        $('[id^=facility-]').children("#btn-minus").click(function () {
            $(this).parent('[id^=facility-]').remove();
        });
    </script>
@endsection

@section('content')
    <div class="card row">
        <div class="card-body px-5 py-4">
            <div class="d-flex justify-content-between">
                <div><h3 class="card-title mb-3">ویرایش اتاق</h3></div>
                <div><a href="{{route('admin.room.index')}}" class="btn btn-primary p-2">نمایش اتاقها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.room.update' , ['room' => $room->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$room->name}}" placeholder="نام">
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="scale">متراژ(متر):</label>
                        <input type="text" name="scale" class="form-control" value="{{$room->scale}}" id="scale" placeholder="متراژ"
                               onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                        @error('scale')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="capacity"> ظرفیت:</label>
                        <input type="text" name="capacity" class="form-control" id="capacity" value="{{$room->capacity}}" placeholder="ظرفیت">
                        @error('capacity')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="extra_people"> تعداد افراد اضافه:</label>
                        <input type="text" name="extra_people" class="form-control" id="extra_people" value="{{$room->extra_people}}" placeholder="تعداد افراد اضافه">
                        @error('extra_people')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price_per_extra_people"> مبلغ پرداختی برای هر فرد اضافه:</label>
                        <input type="text" name="price_per_extra_people" class="form-control" id="price_per_extra_people" value="{{$room->price_per_extra_people}}" placeholder="مبلغ پرداختی برای هر فرد اضافه">
                        @error('price_per_extra_people')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price_per_holiday"> قیمت روزهای تعطیل:</label>
                        <input type="text" name="price_per_holiday" class="form-control" id="price_per_holiday" value="{{$room->price_per_holiday}}" placeholder="قیمت روزهای تعطیل">
                        @error('price_per_holiday')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price_per_non_holiday"> قیمت روزهای غیر تعطیل:</label>
                        <input type="text" name="price_per_non_holiday" class="form-control" id="price_per_non_holiday" value="{{$room->price_per_non_holiday}}" placeholder="قیمت روزهای غیر تعطیل">
                        @error('price_per_non_holiday')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="province">استان:</label>
                        <select class="form-control" id="province">
                            @foreach($provinces as $province)
                                <option value="{{$province->id}}" @selected($room->city->province_id === $province->id)>{{$province->name}}</option>
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
                        <input type="text" name="village" class="form-control" id="village" value="{{$room->village}}" placeholder="نام روستا">
                        @error('village')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3 number_of_rooms">
                        <label for="number_of_rooms">تعداد اتاق:</label>
                        <select class="form-control" name="number_of_rooms" id="number_of_rooms">
                            @foreach(range(0,10) as $num)
                                <option value="{{$num}}" @selected($room->number_of_rooms === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_bedrooms === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_bed_one === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_bed_two === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_wc_iranian === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_wc_frangi === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_tub_bathroom === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->number_of_normal_bathroom === $num)>{{$num}} </option>
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
                                <option value="{{$num}}" @selected($room->floor === $num)>
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
                        <label for="textureAndView"> بافت و چشم انداز:</label>
                        <input type="text" name="textureAndView" class="form-control" id="textureAndView" value="{{$room->textureAndView}}" placeholder="بافت و چشم انداز">
                        @error('textureAndView')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">آدرس:</label>
                        <textarea name="address" class="form-control" id="address" placeholder="آدرس" rows="3">{{$room->address}}</textarea>
                        @error('address')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group exclusive">
                        <div class="form-check">
                            <label for="exclusive" class="form-check-label">
                                <input type="checkbox" name="exclusive" id="exclusive" class="form-check-input" @checked($room->exclusive === 1)>دربست
                            </label>
                        </div>
                        @error('exclusive')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label> توضیحات:</label>
                        <div class="text-dark">
                            <textarea class="form-control" name="description" id="editor" placeholder="توضیحات">{{$room->description}}</textarea>
                        </div>
                        @error('description')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <h3 class="mt-4">امکانات اقامتگاه:</h3 class="my-4">
                    <p class="mb-4">مقادیر را با ویرگول از هم جدا کنید.</p>
                    @foreach($room->facilityValues()->groupBy('facility_id')->get() as $facilityValue)
                        <div id="facility-{{$facilityValue->id}}">
                            <div id="btn-minus" class="btn-minus"><i class="mdi mdi-minus"></i></div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label> نام:</label>
                                    <select class="form-control" name="facilities[facility_id][]">
                                        @foreach($facilities as $facility)
                                            <option value="{{$facility->id}}" @selected($facilityValue->facility->id === $facility->id)>{{$facility->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-9">
                                    <label> مقدار:</label>
                                    <input type="text" name="facilities[value][]" value="{{implode("," , $room->facilityValues()->where('facility_id' , $facilityValue->facility_id)->pluck('value')->toArray())}}" class="form-control" placeholder="مقدار">
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
