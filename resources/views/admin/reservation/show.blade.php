@extends('admin.layouts.admin' , ['sectionName' => 'نمایش رزرو'])

@section('title' , 'نمایش رزرو')

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
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $reservation->guest->name }}</h3></div>
                        <div><a href="{{route('admin.reservation.index')}}" class="btn btn-primary p-2">نمایش رزرو ها</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <tr class="text-white">
                                <td>نام</td>
                                <td>{{$reservation->guest->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>شماره همراه</td>
                                <td>{{$reservation->guest->number}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>نام اتاق</td>
                                <td>{{$reservation->room->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تاریخ شروع</td>
                                <td>{{$reservation->start_time}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تاریخ پایان</td>
                                <td>{{$reservation->end_time}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تعداد افراد</td>
                                <td>{{$reservation->number_of_person}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>پرداخت شده</td>
                                <td>{{$reservation->is_pay ? 'بله' : 'خیر'}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>توضیحات</td>
                                <td>{!! $reservation->description ?? '-' !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
