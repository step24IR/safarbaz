<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use App\Services\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::latest()->paginate(10);
        return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::with('reservations')->get();
        return view('admin.reservation.create' , compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request , ReservationService $reservationService)
    {
//        dd($request->start_time,$request->end_time);
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
                'is_pay'  => $request->has('is_pay') ? 1 : 0,
                'description'  => $request->description,
            ]);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('message' , 'اطلاعات ثبت نشد.');
        }

        return redirect()->route('admin.reservation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('admin.reservation.show' , compact('reservation' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $rooms = Room::with('reservations')->get();
        return view('admin.reservation.edit' , compact('reservation' , 'rooms' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, Reservation $reservation, ReservationService $reservationService)
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
            $guest = Guest::findOrFail($reservation->guest_id);
            $guest->update([
                'name' => $request->name,
                'number' => $request->number,
            ]);

            $reservation->update([
                'room_id'  => $request->room_id,
                'end_time'  => $request->end_time,
                'start_time'  => $request->start_time,
                'number_of_person'  => $request->number_of_person,
                'is_pay'  => $request->has('is_pay') ? 1 : 0,
                'description'  => $request->description,
            ]);


            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with('message' , 'اطلاعات ثبت نشد.');
        }

        return redirect()->route('admin.reservation.index');

    }

    public function changePay(Reservation $reservation)
    {
        if($reservation->is_pay)
        {
            $reservation->is_pay = 0;
        }
        else
        {
            $reservation->is_pay = 1;
        }
        $reservation->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back();
    }
}
