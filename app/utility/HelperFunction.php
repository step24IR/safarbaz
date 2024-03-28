<?php

use App\Models\Coupon;
use App\Models\Order;
use Carbon\Carbon;

function generateFileName($name)
{
    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $day = Carbon::now()->day;
    $hour = Carbon::now()->hour;
    $minute = Carbon::now()->minute;
    $second = Carbon::now()->second;
    $microsecond = Carbon::now()->microsecond;
    return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $minute . '_' . $second . '_' . $microsecond . '_' . $name;
}

function to_english_numbers($string) {
    if($string !== null)
    {
        $persinDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $replaces = range(0, 9);

        return str_replace($persinDigits, $replaces , $string);
    }

    return $string;
}
