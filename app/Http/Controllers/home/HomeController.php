<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::pluck('name');
        $cities = $cities->merge(Room::groupBy('village')->pluck('village'));
//        dd($cities);
        $roomImages = RoomImage::inRandomOrder()->limit(7)->get();
        $rooms = Room::latest()->limit(6)->get();
//        dd(asset(env('ROOM_IMAGES_UPLOAD_PATH').$rooms->first()->images()->first()->image));

        return view('home.index' , compact('rooms' , 'roomImages' , 'cities'));
    }
    public function posts()
    {
        return view('home.posts');
    }
}
