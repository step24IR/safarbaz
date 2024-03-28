<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getProvinceCitiesList(Request $request)
    {
        $cities = City::where('province_id', $request->province_id)->get();
        return $cities;
    }

}
