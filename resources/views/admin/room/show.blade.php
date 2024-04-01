@extends('admin.layouts.admin' , ['sectionName' => 'نمایش اتاق'])

@section('title' , 'نمایش اتاق')

@section('head')
    <style>

    </style>
@endsection


@section('scripts')
    <script type="module">

    </script>
@endsection

@section('content')
    <div class="row ">
        <div class="col-md-6 grid-margin mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $room->name }}</h3></div>
                        <div><a href="{{route('admin.room.index')}}" class="btn btn-primary p-2">نمایش اتاق ها</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-end">
                            <tbody>
                            <tr class="text-white">
                                <td>نام</td>
                                <td>{{$room->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>متراژ</td>
                                <td>{{$room->scale}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>ظرفیت</td>
                                <td>{{$room->capacity}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد افراد اضافه</td>
                                <td>{{$room->extra_people}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>مبلغ پرداختی برای هر فرد اضافه</td>
                                <td>{{$room->price_per_extra_people}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>قیمت روزهای تعطیل</td>
                                <td>{{($room->price_per_holiday)}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>قیمت روزهای غیر تعطیل</td>
                                <td>{{($room->price_per_non_holiday)}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>شهر</td>
                                <td>{{$room->city->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>روستا</td>
                                <td>{{$room->village ?? '-'}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد اتاق ها</td>
                                <td>{{$room->number_of_rooms}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد اتاق خواب ها</td>
                                <td>{{$room->number_of_bedrooms}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد تخت خواب های یک نفره</td>
                                <td>{{$room->number_of_bed_one}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد تخت خواب های دو نفره</td>
                                <td>{{$room->number_of_bed_two}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد سرویس بهداشتی ایرانی</td>
                                <td>{{$room->number_of_wc_iranian}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد سرویس بهداشتی فرنگی</td>
                                <td>{{$room->number_of_wc_frangi}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد حمام دارای وان</td>
                                <td>{{$room->number_of_tub_bathroom}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد حمام معمولی</td>
                                <td>{{$room->number_of_normal_bathroom}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>بافت و منظره</td>
                                <td>{{$room->textureAndView ?? '-'}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>ادرس</td>
                                <td>{{$room->address}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>دربست</td>
                                <td>{{$room->exclusive ? 'بله' : 'خیر'}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>شماره طبقه</td>
                                <td>{{$room->floor}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>توضیحات</td>
                                <td>{!! $room->description !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
