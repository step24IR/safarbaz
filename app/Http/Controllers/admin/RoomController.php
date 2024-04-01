<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Facility;
use App\Models\Province;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.room.index', compact('rooms'));
    }

    public function create()
    {
        $facilities = Facility::all();
        $provinces = Province::all();
        return view('admin.room.create' , compact('provinces' , 'facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'scale' => 'nullable',
            'capacity' => 'nullable',
            'extra_people' => 'nullable',
            'price_per_extra_people' => 'nullable',
            'price_per_holiday' => 'nullable',
            'price_per_non_holiday' => 'nullable',
            'city_id' => 'required',
            'village' => 'nullable',
            'number_of_rooms' => 'required',
            'number_of_bedrooms' => 'required',
            'number_of_bed_one' => 'required',
            'number_of_bed_two' => 'required',
            'number_of_wc_iranian' => 'required',
            'number_of_wc_frangi' => 'required',
            'number_of_tub_bathroom' => 'required',
            'number_of_normal_bathroom' => 'required',
            'textureAndView' => 'nullable',
            'address' => 'required',
            'exclusive' => 'nullable',
            'floor' => 'required',
            'description' => 'nullable',
            'images' => 'required'
        ]);
        try
        {
            DB::beginTransaction();
            $room = Room::create([
                'name' => $request->name,
                'scale' => $request->scale ?? 0,
                'capacity' => $request->capacity ?? 0,
                'extra_people' => $request->extra_people ?? 0,
                'price_per_extra_people' => $request->price_per_extra_people ?? 0,
                'price_per_holiday' => $request->price_per_holiday ?? 0,
                'price_per_non_holiday' => $request->price_per_non_holiday ?? 0,
                'city_id' => $request->city_id,
                'village' => $request->village,
                'number_of_rooms' => $request->number_of_rooms,
                'number_of_bedrooms' => $request->number_of_bedrooms,
                'number_of_bed_one' => $request->number_of_bed_one,
                'number_of_bed_two' => $request->number_of_bed_two,
                'number_of_wc_iranian' => $request->number_of_wc_iranian,
                'number_of_wc_frangi' => $request->number_of_wc_frangi,
                'number_of_tub_bathroom' => $request->number_of_tub_bathroom,
                'number_of_normal_bathroom' => $request->number_of_normal_bathroom,
                'textureAndView' => $request->textureAndView,
                'address' => $request->address,
                'exclusive' => $request->has('exclusive') ? 1 : 0,
                'floor' => $request->floor,
                'description' => $request->description,
            ]);

            if($request->images !== null)
            {
                $imageController = new RoomImageController();
                $imageController->store($request->images , $room);
            }
            if($request->has('facilities'))
            {
                $counter = count($request->facilities['facility_id']);

                for ($i = 0; $i < $counter; $i++)
                {
                    $values = explode(",",$request->facilities['value'][$i]) ;
                    foreach ($values as $value)
                    {
                        $room->facilityValues()->create([
                            'facility_id' => $request->facilities['facility_id'][$i],
                            'value' => $value,
                        ]);
                    }

                }
            }

            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return back()->with('message','اطلاعات ثبت نشد.');
        }

        return redirect()->route('admin.room.index');
    }

    public function show(Room $room)
    {
        return view('admin.room.show', compact('room'));
    }

    public function edit(Room $room)
    {
//        dd($room->facilityValues()->where('facility_id' , 2)->pluck('value')->toArray());
        $facilities = Facility::all();
        $provinces = Province::all();
        return view('admin.room.edit', compact('room' , 'provinces' , 'facilities'));
    }

    public function update(RoomRequest $request, Room $room)
    {
        try
        {
            DB::beginTransaction();
            $room->update([
                'name' => $request->name,
                'scale' => $request->scale ?? 0,
                'capacity' => $request->capacity ?? 0,
                'extra_people' => $request->extra_people ?? 0,
                'price_per_extra_people' => $request->price_per_extra_people ?? 0,
                'price_per_holiday' => $request->price_per_holiday ?? 0,
                'price_per_non_holiday' => $request->price_per_non_holiday ?? 0,
                'city_id' => $request->city_id,
                'village' => $request->village,
                'number_of_rooms' => $request->number_of_rooms,
                'number_of_bedrooms' => $request->number_of_bedrooms,
                'number_of_bed_one' => $request->number_of_bed_one,
                'number_of_bed_two' => $request->number_of_bed_two,
                'number_of_wc_iranian' => $request->number_of_wc_iranian,
                'number_of_wc_frangi' => $request->number_of_wc_frangi,
                'number_of_tub_bathroom' => $request->number_of_tub_bathroom,
                'number_of_normal_bathroom' => $request->number_of_normal_bathroom,
                'textureAndView' => $request->textureAndView,
                'address' => $request->address,
                'exclusive' => $request->has('exclusive') ? 1 : 0,
                'floor' => $request->floor,
                'description' => $request->description,
            ]);

            $room->facilityValues()->delete();
            if($request->has('facilities'))
            {
                $counter = count($request->facilities['facility_id']);
                for ($i = 0; $i < $counter; $i++)
                {
                    $values = explode(",",$request->facilities['value'][$i]) ;
                    foreach ($values as $value)
                    {
                        $room->facilityValues()->create([
                            'facility_id' => $request->facilities['facility_id'][$i],
                            'value' => $value,
                        ]);
                    }
                }
            }

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return back()->with('message','اطلاعات ثبت نشد.');
        }

        return redirect()->route('admin.room.index');
    }

    public function destroy(Room $room)
    {
        foreach ($room->images as $image)
        {
            if(File::exists(public_path(env('ROOM_IMAGES_UPLOAD_PATH')).$image->image)){
                File::delete(public_path(env('ROOM_IMAGES_UPLOAD_PATH')).$image->image);
            }
        }
        $room->delete();

        return back();
    }
}
