<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\RoomRequest;
use App\Models\City;
use App\Models\Facility;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use App\Services\ReservationService;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;

class RoomController extends Controller
{
    public function index()
    {
        $cities = City::pluck('name');
        $cities = $cities->merge(Room::groupBy('village')->pluck('village'));

        $rooms = Room::latest()->paginate(6)->withQueryString();
        return view('home.rooms' , compact('rooms','cities'));
    }

    public function show(Room $room)
    {
        $reservations = Reservation::where('room_id' , $room->id)->where('is_pay', 1)->get();
//        dd($reservations->toArray()[1]);
        $facilities = Facility::all();
        return view('home.room' , compact('room' , 'facilities' , 'reservations'));
    }

    public function searchRoom(Request $request, ReservationService $reservationService)
    {
        $request->validate([
            'location' => 'required',
            'start_time' => 'required',
            'end_time'=> 'required' ,
            'number_of_person' => 'required',
        ]);
        $location = $request->location;

        if (!$reservationService->correctDates($request->all()))
        {
            return back()->with('errorMessage' , 'تاریخ خروج باید از تاریخ ورود بزرگتر یاشد.');
        }

        $times = [
            'start_time' => Carbon::parse(Verta::parse($request->start_time)->datetime()),
            'end_time' => Carbon::parse(Verta::parse($request->end_time)->datetime()),
        ];

        $rooms = Room::where(function ($query) use($location){

            $query->whereHas('city' , function ($query) use($location) {
                $query->where('name' , $location);
            })->orWhere('village' , $location);

        })->where(function ($query) use ($request){
            $query->where(DB::raw('capacity + extra_people'), '>=', $request->number_of_person)
            ->orWhere(DB::raw('capacity + extra_people') , 0);
        })->whereDoesntHave('reservations', function ($query) use ($times) {
                $query->where(function ($query) use ($times) {
                    $query->where('start_time', '<=', $times['start_time'])
                        ->where('end_time', '>', $times['start_time']);
                })->orWhere(function ($query) use ($times) {
                    $query->where('start_time', '<=', $times['end_time'])
                        ->where('end_time', '>', $times['end_time']);
                })->orWhere(function ($query) use ($times) {
                        $query->where('start_time', '<', $times['start_time'])
                            ->where('end_time', '>', $times['end_time']);
                    })->where('is_pay', 1);
            })->latest()->paginate(6)->withQueryString();

        $cities = City::pluck('name');
        $cities = $cities->merge(Room::groupBy('village')->pluck('village'));
        return view('home.rooms' , compact('rooms','cities'));
    }

    public function showSearchedRoom($rooms)
    {
        $cities = City::pluck('name');
        $cities = $cities->merge(Room::groupBy('village')->pluck('village'));
//        $rooms = request();
        dd($rooms);
//        $rooms = session()->has('searchedRooms') ? session()->forget('searchedRooms') : session('searchedRooms');
//        if(session()->has('searchedRooms'))
//        {
//            $rooms = session('searchedRooms');
//        }
        return view('home.rooms' , compact('rooms','cities'));
    }

    public function bookRoom(ReservationRequest $request, ReservationService $reservationService)
    {
        if($reservationService->isRoomTaken($request->all()))
        {
            return back()->with('errorMessage' , 'اتاق موردنظر در این تاریخ قبلا رزرو شده است.');
        }
        elseif (!$reservationService->correctDates($request->all()))
        {
            return back()->with('errorMessage' , 'تاریخ خروج باید از تاریخ ورود بزرگتر یاشد.');
        }

        try
        {
            DB::beginTransaction();

            $guest = Guest::create([
                'name' => $request->name,
                'number' => $request->number,
            ]);

            Reservation::create([
                'guest_id'  => $guest->id,
                'room_id'  => $request->room_id,
                'end_time'  => $request->end_time,
                'start_time'  => $request->start_time,
                'number_of_person'  => $request->number_of_person,
                'is_pay'  => 0,
                'description'  => $request->description,
            ]);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with('errorMessage' , 'اطلاعات ثبت نشد.');
        }

        return back()->with('message' , 'اطلاعات شما با موفقیت ثبت شد.');
    }

}
