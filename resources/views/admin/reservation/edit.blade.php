@extends('admin.layouts.admin' , ['sectionName' => 'داشبورد'])

@section('title' , 'ویرایش رزرو')

@section('head')
    @vite(['resources/css/admin/ckeditor.css', 'resources/js/admin/ckeditor.js'])
    <style>

    </style>
@endsection


@section('scripts')
    <script type="module">
        $(document).ready(function() {
            function datePickerForRoom()
            {
                let rooms = @json($rooms);
                let currentreservation = @json($reservation);
                let selectedRoomm = rooms.filter(function (room) {
                    return room.id == $('#room_id').val()
                })

                let reservations = selectedRoomm[0].reservations.filter(function (reservation){
                    return (reservation.id !== currentreservation.id && reservation.is_pay === 1)
                });

                let from = $("#start_time").persianDatepicker({
                    initialValueType: 'persian',
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
                    checkDate: function(unix){
                        let resv = reservations.filter(function (reservation){
                            return  new persianDate(unix).toLocale('en').format('YYYY-MM-DD') >= reservation.start_time
                                && new persianDate(unix).toLocale('en').format('YYYY-MM-DD') < reservation.end_time;
                        })
                        return resv.length <= 0;
                    }
                });
                let to = $("#end_time").persianDatepicker({
                    initialValueType: 'persian',
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
                            return (new persianDate(unix).toLocale('en').format('YYYY-MM-DD') >= reservation.start_time
                                && new persianDate(unix).toLocale('en').format('YYYY-MM-DD') < reservation.end_time);
                        })
                        return resv.length <= 0;
                    }
                });

            }
            datePickerForRoom()

            $('#room_id').on('change' , function (){
                datePickerForRoom()
            })
        });
    </script>
@endsection

@section('content')
    <div class="card row">
        <div class="card-body px-5 py-4">
            <div class="d-flex justify-content-between">
                <div><h3 class="card-title mb-3">ویرایش رزرو</h3></div>
                <div><a href="{{route('admin.reservation.index')}}" class="btn btn-primary p-2">نمایش رزروها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.reservation.update' , ['reservation' => $reservation->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$reservation->guest->name}}" placeholder="نام">
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number"> شماره همراه:</label>
                        <input type="text" name="number" class="form-control" id="number" value="{{$reservation->guest->number}}" placeholder="شماره همراه">
                        @error('number')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="room_id">انتخاب اتاق:</label>
                        <select name="room_id" class="form-control" id="room_id">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}" @selected($reservation->room_id === $room->id)> {{$room->name}}</option>
                            @endforeach
                        </select>
                        @error('room_id')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="start_time">زمان شروع:</label>
                        <input type="text" name="start_time" class="form-control" value="{{$reservation->start_time}}" id="start_time" placeholder="زمان شروع"
                               onkeypress="return false">
                        @error('start_time')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_time">زمان پایان:</label>
                        <input type="text" name="end_time" class="form-control" value="{{$reservation->end_time}}" id="end_time" placeholder="زمان پایان"
                               onkeypress="return false">
                        @error('end_time')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number_of_person"> تعداد افراد:</label>
                        <select name="number_of_person" id="number_of_person" class="form-control">
                            @foreach(range(1,50) as $num)
                                <option value="{{$num}}" @selected($reservation->number_of_person === $num)>{{$num}}</option>
                            @endforeach
                        </select>
                        @error('number_of_person')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> توضیحات:</label>
                        <div class="text-dark">
                            <textarea class="form-control" name="description" id="editor" placeholder="توضیحات">{{$reservation->description}}</textarea>
                        </div>
                        @error('description')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label for="is_pay" class="form-check-label">
                                <input type="checkbox" name="is_pay" id="is_pay" class="form-check-input" @checked($reservation->is_pay === 1)>پرداخت شده
                            </label>
                        </div>
                        @error('is_pay')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
