<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;

class ReservationService
{
    public function isRoomTaken($requestData)
    {
        $start_time     = Carbon::parse(Verta::parse($requestData['start_time'])->datetime());
        $end_time       = Carbon::parse(Verta::parse($requestData['end_time'])->datetime());

        $isBooked = Reservation::where('room_id', $requestData['room_id'])
            ->where('start_time', '<=', $end_time)
            ->where('end_time', '>', $start_time)
            ->where('is_pay', 1)
            ->exists();
//        dd($isBooked);
        return $isBooked;
    }
    public function correctDates($requestData)
    {
        $start_time     = Carbon::parse(Verta::parse($requestData['start_time'])->datetime());
        $end_time       = Carbon::parse(Verta::parse($requestData['end_time'])->datetime());

        $correct = $end_time->gt($start_time);
        return $correct;
    }
}
